<?php
/**
 * Template Name: Building
 */
?>
<?php while (have_posts()) : the_post(); ?>

<div id="container" class="container" role="main">
	<div class="wrapper wrapper--fullwidth">

	<?php $actbuilding=3; ?>


  <?php
    $ima = get_tax_meta( $actbuilding ,'_meta_view1');
    $imcifull = wp_get_attachment_image_src( $ima['id'], 'full169');
    $imcilarge = wp_get_attachment_image_src( $ima['id'], 'large169');
    $imcimedium = wp_get_attachment_image_src( $ima['id'], 'medium169');
  ?>

	<style>
		.visualchooser--1 {
			min-height: 75vh;
		}
	  .visualchooser--1 { background-image: url('<?php echo $imcimedium[0]; ?>'); }

	  @media only screen and (min-width: 1024px) {
	    .visualchooser--1 { background-image: url('<?php echo $imcilarge[0]; ?>'); }
	  }
	  
	  @media only screen and (min-width: 1280px) {
	    .visualchooser--1 { background-image: url('<?php echo $imcifull[0]; ?>'); }
	  }
	</style>




	<div class="thechooser">
		<div id="visualchooser--1" class="visualchooser visualchooser--1">
			<a class="btn">North<i class="ion ion-reply"></i></a>
		</div>
		<div id="detailswrapper" class="wrapper wrapper--normal detailswrapper">
			<div class="datatable datatable-apartments">
			  <p class="datarow datatable--head">
					<span class="datarow--cell de">Navn</span>
					<span class="datarow--cell de">Roms</span>
					<span class="datarow--cell">Etasje</span>
					<span class="datarow--cell">BRA</span>
					<span class="datarow--cell">P-rom</span>
					<span class="datarow--cell">Bod</span>
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


	</div>
</div>

<?php endwhile; ?>

