<?php
/**
 * Template Name: Front Page
 */
?>

<?php while (have_posts()) : the_post(); ?>

<?php 
	$banner=wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), '', FALSE);
?>
<style>
	.hero {
		background-image: url('<?= $banner[0]; ?>');
	}
</style>
<header class="hero">
		<div class="hero__brand">
			<a href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
		</div>
	<div class="wrapper wrapper--wide">
		<div class="hero__text">
			<h1><?php echo get_post_meta( get_the_ID(), 'welcometext', true ); ?></h1>
			<div class="hero__paragr">
			<?php if ( get_post_meta( get_the_ID(), 'homep', true )) : ?>
				<div class="hero__paragr">
				<?= wpautop(get_post_meta( get_the_ID(), 'homep', true )); ?>
				</div>
			<?php endif; ?>
			<a href="<?php echo get_post_meta( get_the_ID(), 'buttonurl', true ); ?>" class="btn">
				<?php echo get_post_meta( get_the_ID(), 'buttontext', true ); ?>
			</a>
		</div>
	</div>
</header>
<?php get_template_part('templates/header'); ?>

<div id="container" class="container" role="main">
	<?php get_template_part('templates/section','lister'); ?>

	<section class="content content--bilder">
		<img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/homeinterior.jpg" alt="">
	</section>

</div>
  
<?php endwhile; ?>
