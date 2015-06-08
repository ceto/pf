<?php



/********* Custom Post Types for Apartment Management ****************/


/**
 * Apartment Definition
*/
function pf_create_apartment() {
  $labels = array(
    'name' => 'Apartments',
    'singular_name' => 'Apartment',
    'add_new' => 'Add New Apartment',
    'add_new_item' => 'Add New Apartment',
    'edit_item' => 'Edit Apartment',
    'new_item' => 'New Apartment',
    'all_items' => 'All Apartments',
    'view_item' => 'View Apartment',
    'search_items' => 'Search Apartments',
    'not_found' =>  'No Apartments found',
    'not_found_in_trash' => 'No Apartments found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Apartments'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'leilighets' ),
    'capability_type' => 'post',
    'has_archive' => FALSE, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'thumbnail', 'page-attributes')
  ); 

  register_post_type( 'apartment', $args );
}
add_action( 'init', 'pf_create_apartment' ); 

/********* END OF Custom Post Types for Apartment Management ****************/



/************* Custom Apartment Type Taxonomies for Apartment Management *********/

// add_action( 'init', 'pf_create_type_taxonomies', 0 );

// function pf_create_type_taxonomies() {
//   // Add new taxonomy, make it hierarchical (like categories)
//   $labels = array(
//     'name'              => _x( 'Apartment Types', 'taxonomy general name' ),
//     'singular_name'     => _x( 'Apartment Type', 'taxonomy singular name' ),
//     'search_items'      => __( 'Search Apartment Types' ),
//     'all_items'         => __( 'All Apartment Types' ),
//     'parent_item'       => __( 'Parent Apartment Type' ),
//     'parent_item_colon' => __( 'Parent Apartment Type:' ),
//     'edit_item'         => __( 'Edit Apartment Type' ),
//     'update_item'       => __( 'Update Apartment Type' ),
//     'add_new_item'      => __( 'Add New Apartment Type' ),
//     'new_item_name'     => __( 'New Apartment Type Name' ),
//     'menu_name'         => __( 'Apartment Types' ),
//   );

//   $args = array(
//     'hierarchical'      => FALSE,
//     'labels'            => $labels,
//     'show_ui'           => true,
//     'show_admin_column' => true,
//     'query_var'         => true,
//     'rewrite'           => array( 'slug' => 'apartment-type' ),
//   );

//   register_taxonomy( 'apartment-type', array( 'apartment' ), $args );
// }

/********* END OF Custom Apartment Type Taxonomies for Apartment Management ****************/


/************* Custom Building Taxonomies for Apartment Management *********/

add_action( 'init', 'pf_create_building_taxonomies', 0 );

function pf_create_building_taxonomies() {
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name'              => _x( 'Buildings', 'taxonomy general name' ),
    'singular_name'     => _x( 'Building', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Buildings' ),
    'all_items'         => __( 'All Buildings' ),
    'parent_item'       => __( 'Parent Building' ),
    'parent_item_colon' => __( 'Parent Building:' ),
    'edit_item'         => __( 'Edit Building' ),
    'update_item'       => __( 'Update Building' ),
    'add_new_item'      => __( 'Add New Building' ),
    'new_item_name'     => __( 'New Building Name' ),
    'menu_name'         => __( 'Buildings' ),
  );

  $args = array(
    'hierarchical'      => TRUE,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'bygg' ),
  );

  register_taxonomy( 'building', array( 'apartment' ), $args );
}

/********* END OF Custom Building Taxonomies for Apartment Management ****************/


/********* Custom Tax Meta for Building Taxonomy ****************/
require_once("TMC/Tax-meta-class.php");
if (is_admin()){
  $tprefix = '_meta_';
  $csonfig = array(
    'id' => 'ometa', // meta box id, unique per meta box
    'title' => 'Details of the building', // meta box title
    'pages' => array('building'), // taxonomy name, accept categories, post_tag and custom taxonomies
    'context' => 'normal', // where the meta box appear: normal (default), advanced, side; optional
    'fields' => array(), // list of meta fields (can be added by field arrays)
    'local_images' => false, // Use local or hosted images (meta box images for add/remove)
    'use_with_theme' => '/wp-content/themes/pf/lib/TMC' //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );
  $my_meta =  new Tax_Meta_Class($csonfig);
  
  $my_meta->addImage($tprefix.'view1', array('name'=> 'View I.'));
  $my_meta->addImage($tprefix.'view2', array('name'=> 'View II.'));

  $my_meta->Finish();
}

/********* END OF Custom Tax Meta for Building Taxonomy ****************/



/************ MetaBoxes **********/

if ( file_exists(  __DIR__ .'/CMB2/init.php' ) ) { require_once  __DIR__ .'/CMB2/init.php';};

/************ MetaBoxes **********/


add_filter( 'cmb2_meta_boxes', 'pf_metaboxes' );

function pf_metaboxes( array $meta_boxes ) {

	/**
	 * Apartment Metaboxes
	*/
  $prefix = '_meta_';

  $meta_boxes['apartment'] = array(
    'id'         => 'ameta',
    'title'      => 'Apartment details',
    'object_types'  => array( 'apartment'), // Post type
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true, // Show field names on the left
    'fields'     => array(

    array(
      'name' => 'State',
      'id'   => $prefix . 'state',
      'type' => 'radio_inline',
      'options' => array(
          'fri' => 'Available',
          'utsolgt' => 'Sold',
          'reserved' => 'Reserved',
      )
    ),

    array(
        'name' => 'Rom',
        'id'   => $prefix . 'rom',
        'type' => 'text_small',
    ),

    array(
      'name' => __('Floor'),
      'id'   => $prefix . 'floor',
      'type' => 'radio_inline',
      'options' => array(
          'EG' => 'Bakkeplan',
          '1' => '1. OG',
          '2' => '2. OG',
          '3' => '3. OG',
          '4' => '4. OG',
          '5' => '5. OG',
          '6' => '6. OG',
      )
    ),

    array(
        'name' => 'BRA',
        'id'   => $prefix . 'bra',
        'type' => 'text_small',
    ),
    
    array(
        'name' => 'P-rom',
        'id'   => $prefix . 'prom',
        'type' => 'text_small',
    ),

    array(
        'name' => 'Bod',
        'id'   => $prefix . 'bod',
        'type' => 'text_small',
    ),

    array(
        'name' => 'Balkong',
        'id'   => $prefix . 'balkong',
        'type' => 'text_small',
    ),

    array(
        'name' => 'Markterasse',
        'id'   => $prefix . 'markterasse',
        'type' => 'text_small',
    ),

    array(
        'name' => 'Pris',
        'id'   => $prefix . 'pris',
        'type' => 'text_small',
    ),

    array(
      'name' => 'Floor map',
      'desc' => 'Upload an image or enter an URL.',
      'id' => $prefix . 'floormap',
      'type' => 'file',
    ),

    array(
      'name' => 'Schema',
      'desc' => 'Upload an image or enter an URL.',
      'id' => $prefix . 'schema',
      'type' => 'file',
    ),


    array(
        'name' => 'SVG Def. on View I.',
        'desc' => 'Experimental! Do not change it!',
        'id'   => $prefix . 'svgdata1',
        'type' => 'textarea_small',
    ),

    array(
        'name' => 'SVG Def. on View II.',
        'desc' => 'Experimental! Do not change it!',
        'id'   => $prefix . 'svgdata2',
        'type' => 'textarea_small',
    ),
   
    ),
  );


	/******** end of Apartment Metaboxes *****/


  $meta_boxes['building'] = array(
    'id'         => 'buildmeta',
    'title'      => 'Set these elements elements',
    'object_types'  => array( 'page'), // Post type
    'show_on'      => array( 'key' => 'page-template', 'value' => 'template-building.php' ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true, // Show field names on the left
    'fields'     => array(

      array(
        'name' => __('Select a view'),
        'id'   => $prefix . 'gview',
        'type' => 'radio_inline',
        'options' => array(
            '1' => 'North',
            '2' => 'South',
        )
      ),




    )
  );



	$meta_boxes['home'] = array(
    'id'         => 'homemeta',
    'title'      => 'Home Page header elements',
    'object_types'  => array( 'page'), // Post type
    'show_on'      => array( 'key' => 'page-template', 'value' => 'template-homepage.php' ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true, // Show field names on the left
    'fields'     => array(
			array (
		    'name' => 'Welcome text',
		    'id'   => 'welcometext',
		    'type' => 'textarea_small',
		  ),
      array (
        'name' => 'Bomber paragraph',
        'id'   => 'homep',
        'type' => 'wysiwyg',
        'options' => array(
          'media_buttons' => false, // show insert/upload button(s)
          'textarea_rows' =>  3, // rows="..."
          'teeny' => true, // output the minimal editor config used in Press This
        ),
      ),
		  array (
		    'name' => 'Button text',
		    'id'   => 'buttontext',
		    'type' => 'text_medium',
		  ),
		  array (
		    'name' => 'Button url',
		    'id'   => 'buttonurl',
		    'type' => 'text_url',
		  ),



    )
  );

  $meta_boxes['page'] = array(
    'id'         => 'pagemeta',
    'title'      => 'Add page content here',
    'object_types'  => array( 'page'), // Post type
    //'show_on'      => array( 'key' => 'page-template', 'value' => 'template-homepage.php' ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true, // Show field names on the left
    'fields'     => array(
			array(
			  'id'          => 'sections',
			  'type'        => 'group',
			  'description'        => __( 'Repeatable Sections', 'cmb' ),
			  'options'     => array(
			    'group_title'   => __( 'Section {#}', 'cmb' ),
			    'add_button'    => __( 'New section', 'cmb' ),
			    'remove_button' => __( 'Remove section', 'cmb' ),
			    'sortable'      => true, // beta
			  ),
			  'fields' => array (
					array(
						'name'    => 'Fulwidth divider',
						'desc'    => 'Add an image to the top of section. (optional)',
						'id'      => 'divider',
						'type'    => 'file',
					),
			    array (
			      'name' => 'Title',
			      'id'   => 'title',
			      'type' => 'text',
			    ),
			    array (
			      'name' => 'Lead',
			      'id'   => 'lead',
			      'type' => 'wysiwyg',
            'options' => array(
              'media_buttons' => false, // show insert/upload button(s)
              'textarea_rows' =>  8, // rows="..."
              'teeny' => true, // output the minimal editor config used in Press This
            ),
			    ),
			    array (
			      'name' => 'Left column',
			      'id'   => 'contentleft',
			      'type' => 'wysiwyg',
            'options' => array(
              //'media_buttons' => false, // show insert/upload button(s)
              'textarea_rows' =>  12, // rows="..."
              'teeny' => true, // output the minimal editor config used in Press This
            ),
			    ),
			    array (
			      'name' => 'Right column',
			      'id'   => 'contentright',
			      'type' => 'wysiwyg',
            'options' => array(
              //'media_buttons' => false, // show insert/upload button(s)
              'textarea_rows' =>  12, // rows="..."
              'teeny' => true, // output the minimal editor config used in Press This
            ),
			    ),

			  ) 

			),

		)



  );






	  return $meta_boxes;
	}





add_action('admin_init','pf_remove_editor');
function pf_remove_editor() {
  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
  $post_type = get_post_type($post_id);

	if( !isset( $post_id ) ) return;

  if( ($post_type == 'page') || ($post_type == 'apartment') ) {
  	add_post_type_support( 'page', 'excerpt' );
  	remove_post_type_support('page', 'editor');
  }
}



remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

