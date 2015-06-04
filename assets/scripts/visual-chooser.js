/********* Visual Choser Part ********/

if ( $('.visualchooser').length > 0 ) {
    var szelesseg = $('.visualchooser').width();
    var origwidth=$('.visualchooser').attr('data-width');
    var origheight=$('.visualchooser').attr('data-height');
    var paper = new Raphael(document.getElementById('visualchooser'), origwidth, origheight);
    var origratio=origheight/origwidth;
    console.log(origwidth + '/' + origheight);

}

function redraw_canvas() {
  paper.clear();
  szelesseg = $('.visualchooser').width();
  magassag = $('.visualchooser').height();

  paper.setSize(szelesseg, szelesseg*origratio);
  paper.setViewBox(0, 0, origwidth, origheight, true);

  var items = [];
  var text ='';

  $('.datarow--link').each(function(index) {
    var menuitem = $(this);

    items[index] = paper.path(menuitem.attr('data-svgdata'));

            
    items[index].node.id = 'v' +  menuitem.attr('id');


    if ( menuitem.attr('data-state')==='fri' ) {
      text="<h3>"+menuitem.attr('data-name')+"</h3><p>Område: "+menuitem.attr('data-omr')+",<br>Pris: "+menuitem.attr('data-pris')+"</p>";
    } else {
      if ( menuitem.attr('data-state')==='utsolgt' ) {
        text="Utsolgt";
      } else {
        text=menuitem.attr('data-name');
      }
    }

    items[index].attr(
      {
       
        fill: (menuitem.attr('data-state')==='fri')?'#F37C4B':(menuitem.attr('data-state')==='utsolgt')?'#EA4933':'#EBC40C',
        opacity: (menuitem.attr('data-state')!=='fri')?0.5:0,
        stroke: '#000',
        'stroke-width': '0',
        'stroke-opacity': '100',
        href:$(this).attr('data-url'),
        //title: text

      }
    );
    

    items[index].data('data-id', menuitem.attr('id'));
    
    //items[index].data('url', $(this).attr('data-url'));

    
   
    items[index].click(function () {
        window.location=(items[index].data('url'));
    });


    items[index].hover(
      function(event){
        items[index].attr(
        {
          opacity: (menuitem.attr('data-state')!=='fri')?0.75:0.5,
        });
        menuitem.toggleClass('active');
      },
      function(){
        items[index].attr(
        {
          opacity: (menuitem.attr('data-state')!=='fri')?0.5:0,
        });
        menuitem.toggleClass('active');
      }
    );

    menuitem.hover(
      function(){
        items[index].attr(
        {
          opacity: (menuitem.attr('data-state')!=='fri')?0.75:0.5,
        });
      },
      function(){
          items[index].attr(
          {
            opacity: (menuitem.attr('data-state')!=='fri')?0.5:0,
          });
      }
    );


  });

  $('path').tooltip({
    container: '.visualchooser',
    html:true,
    placement:'auto top',
    delay: { "show": 100, "hide": 0 },
    title:function() {
      var thedata=$('#'+$(this).attr('id').slice(1));

      var name = thedata.attr('data-name');
      var rom = thedata.attr('data-rom');
      var floor = thedata.attr('data-floor');
      var bra = thedata.attr('data-bra');
      var prom = thedata.attr('data-prom');
      var bod = thedata.attr('data-bod');
      var pris = thedata.attr('data-pris');
      var state = thedata.attr('data-state');
      var url = thedata.attr('data-url');
      
      $tiptext='<p class="tooltip__item"><span>Navn</span>'+name+'</p>';
      $tiptext+='<p class="tooltip__item"><span>Rom</span>'+rom+'</p>';
      $tiptext+='<p class="tooltip__item"><span>Floor</span>'+floor+'</p>';
      $tiptext+='<p class="tooltip__item"><span>Bra</span>'+bra+'</p>';
      $tiptext+='<p class="tooltip__item"><span>Prom</span>'+prom+'</p>';
      $tiptext+='<p class="tooltip__item"><span>Bod</span>'+bod+'</p>';
      $tiptext+='<p class="tooltip__item"><span>Pris</span>'+pris+'</p>';
      $tiptext+='<p class="tooltip__item"><span>State</span>'+state+'</p>';
      
      return $tiptext;
    }
  });

}


jQuery(document).ready(function() {
  
  if ( $('.visualchooser').length > 0 ) {
    redraw_canvas();
    $(window).resize(redraw_canvas);
  }



});