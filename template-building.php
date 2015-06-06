<?php
/**
 * Template Name: Chooser Template
 */
?>
<?php while (have_posts()) : the_post(); ?>

<div id="container" class="container" role="main">
	<div class="wrapper wrapper--fullwidth">

	<?php 
		$actbuilding=3;
		$gview= get_post_meta( $post->ID, '_meta_gview', true );

  	switch ($gview) {
			case 1:
				$ima = get_tax_meta( $actbuilding ,'_meta_view1');
				$selviewlink = get_the_permalink(42);
				$selviewtext = get_the_title(42);
				break;
			case 2:
				$ima = get_tax_meta( $actbuilding ,'_meta_view2');
				$selviewlink = get_the_permalink(9);
				$selviewtext = get_the_title(9);
				break;
			
			default:
				$ima = get_tax_meta( $actbuilding ,'_meta_view1');
				$selviewlink = get_the_permalink(42);
				$selviewtext = get_the_title(42);
				break;
		}

    $imcifull = wp_get_attachment_image_src( $ima['id'], 'full');
    $imcilarge = wp_get_attachment_image_src( $ima['id'], 'large');
    $imcimedium = wp_get_attachment_image_src( $ima['id'], 'medium');
  ?>

	<!-- <style>
	
	  .visualchooser--1 { background-image: url('<?= $imcimedium[0]; ?>'); }

	  @media only screen and (min-width: 1024px) {
	    .visualchooser--1 { background-image: url('<?= $imcilarge[0]; ?>'); }
	  }
	  
	  @media only screen and (min-width: 1280px) {
	    .visualchooser--1 { background-image: url('<?= $imcifull[0]; ?>'); }
	  }
	</style> --> 


	<div class="thechooser">
		<div id="visualchooser" class="visualchooser visualchooser--1" data-width="<?= $imcifull[1]; ?>" data-height="<?= $imcifull[2]; ?>">
			<img src="<?= $imcifull[0]; ?>" alt="Fin din bolig">
			<a href="<?= $selviewlink;  ?>" class="btn"><?= $selviewtext; ?><i class="ion ion-reply"></i></a>
		</div>
		<div id="detailswrapper" class="wrapper wrapper--normal detailswrapper">
			<div class="datatable datatable-apartments">
			  <p class="datarow datatable--head">
					<span class="datarow--cell de">Leilnr</span>
					<span class="datarow--cell de">Roms</span>
					<span class="datarow--cell">Etg</span>
					<span class="datarow--cell">BRA</span>
					<span class="datarow--cell">P-rom</span>
					<span class="datarow--cell">Pris / Status</span>
			  </p>
				<?
					$the_aps = new WP_Query( array(
						'post_type' => 'apartment',
						'tax_query' => array(
								array(
									'taxonomy' => 'building',
									'field'    => 'term_id',
									'terms'    => $actbuilding,
								),
						),
						'orderby' => 'title',
						'order'   => 'ASC',
					));

				?>
				<?php while ( $the_aps->have_posts() ) : $the_aps->the_post(); ?>
			    <?php get_template_part('templates/apartment','datarow'); ?>
			  <?php endwhile; ?>
			</div>
	  </div>
	</div>

	<?php get_template_part('templates/section','lister'); ?>

</div>
</div>

<?php endwhile; ?>

