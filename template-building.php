<?php
/**
 * Template Name: Building
 */
?>
<?php while (have_posts()) : the_post(); ?>
<div id="container" class="container" role="main">
	<div class="wrapper wrapper--fullwidth">

		<div class="thechooser">
			<div id="visualchooser" class="visualchooser visualchooser--north">
				<img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/building_front.jpg" alt="">
				<a class="btn">North<i class="ion ion-reply"></i></a>
			</div>
			<div id="detailswrapper" class="wrapper wrapper--normal detailswrapper">
				<div class="datatable datatable-apartments">
				  <p class="datarow datatable--head">
						<span class="datarow--cell de">Navn</span>
						<span class="datarow--cell">Etasje</span>
						<span class="datarow--cell">BRA</span>
						<span class="datarow--cell">Roms</span>
						<span class="datarow--cell">Balkong</span>
						<span class="datarow--cell">Pris / Status</span>
				  </p>
				  {% for i in (1..10) %}
				    <?php get_template_part('templates/apartment','datarow'); ?>
				  {% endfor %}
				</div>
		  </div>
		</div>
	</div>
</div>

<?php endwhile; ?>
