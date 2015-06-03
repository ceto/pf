<?php 
if ( get_post_meta( get_the_ID(), 'sections', true ) ) {

$sections = get_post_meta( get_the_ID(), 'sections', true );

foreach ( (array) $sections as $key => $entry ) { ?>
  <section class="subcontent">
     
     <?php if ($entry['divider']!='') : ?>
	     <div class="subcontent__hero">
				<div class="wrapper wrapper--fullwidth">
					<?php 
						$banner=wp_get_attachment_image_src( $entry['divider_id'], '', FALSE);
					?>
					<img src="<?php echo $banner[0]; ?>" alt="<?php echo esc_html( $entry['title'] ); ?>">
				</div>
			</div>
		<?php endif; ?>


  	<div class="wrapper wrapper--narrow">
      <h2 class="subcontent__title lineas">
      	<?php echo $entry['title']; ?>
      </h2>
      
      <?php if ($entry['lead']!='') : ?>
        <div class="subcontent__lead">
					<?php echo wpautop( $entry['lead'] ); ?>
        </div>
   	 	<?php endif; ?>

		</div>

		<?php if ( $entry['contentleft']!='' || $entry['contentright']!='' ) : ?>
			<div class="wrapper wrapper--wide">
				<div class="subcontent__text">
					<div class="fele fele--bal">
						<?php echo wpautop( $entry['contentleft'] ); ?>
					</div>

					<div class="fele fele--jobb">	
						<?php echo wpautop( $entry['contentright'] ); ?>
					</div>
				</div>		
			</div>
		<?php endif; ?>



 	</section>

<?php } 

}
?>
