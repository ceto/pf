<?php while (have_posts()) : the_post(); ?>
<?php 
	$banner=wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), '', FALSE);
?>
<style>
	.pagehero {
		background-image: url('<?= $banner[0]; ?>');
	}
</style>

<header class="pagehero">
	<div class="wrapper wrapper--fullwidth">
		<!-- <a href="#container" class="pagehero__more">Read more&hellip;</a> -->
	</div>
</header>

<div id="container" class="container" role="main">

<?php get_template_part('templates/section','lister'); ?>

	<?php 
		if (is_page(2)) {
			get_template_part('templates/gmap');
			get_template_part('templates/tricky');
		}
	?>



</div>

<?php endwhile; ?>
