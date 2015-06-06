<?php while (have_posts()) : the_post(); ?>
<div id="container" class="container" role="main">
	<div class="wrapper wrapper--wide">
		
		<div class="single--apartment__alaprajz">
			<?php
				$floormap = wp_get_attachment_image_src( get_post_meta($post->ID, '_meta_floormap_id', true), '', FALSE);
				?>
			<a class="popup-zoom" href="<?php echo $floormap[0]; ?>">
				<img src="<?php echo $floormap[0]; ?>" alt="<?php the_title(); ?>"/>
			</a>
		</div>
		
		<div class="single--apartment__adatok">
			<header class="single--apartment__head">
				<h1 class="single--apartment__title">Leilighetsnr
					<span><?php the_title(); ?></span>
				</h1>
			</header>
			<ul class="datapanel single--apartment__datapanel">
				<li class="datapanel__item">
					<span>Rom</span><?php echo get_post_meta( $post->ID, '_meta_rom', true ); ?>-roms
				</li>
				<li class="datapanel__item">
					<span>Etg</span><?php echo get_post_meta( $post->ID, '_meta_floor', true ); ?>
				</li>
				<li class="datapanel__item">
					<span>BRA</span><?php echo get_post_meta( $post->ID, '_meta_bra', true ); ?> m<sup>2</sup>
				</li>
				<li class="datapanel__item">
					<span>P-rom</span><?php echo get_post_meta( $post->ID, '_meta_prom', true ); ?> m<sup>2</sup>
				</li>
				<?php if (get_post_meta( $post->ID, '_meta_balkong', true )!='') : ?>
					<li class="datapanel__item">
						<span>Balkong</span><?php echo get_post_meta( $post->ID, '_meta_balkong', true ); ?> m<sup>2</sup>
					</li>
				<?php endif; ?>
				
				<?php if (get_post_meta( $post->ID, '_meta_markterasse', true )!='') : ?>
				<li class="datapanel__item">
					<span>Markterasse</span><?php echo get_post_meta( $post->ID, '_meta_markterasse', true ); ?> m<sup>2</sup>
				</li>
				<?php endif; ?>

				<?php if (get_post_meta( $post->ID, '_meta_state', true )=='fri') : ?>
				<li class="datapanel__item">
					<span>Pris</span><?php echo number_format(get_post_meta( $post->ID, '_meta_pris', true ), 0, ',', ' '); ?>,-
				</li>
				<?php else : ?>
				<li class="datapanel__item">
					<span>Status</span> <?php echo get_post_meta( $post->ID, '_meta_state', true ); ?>
				</li>
				<?php endif; ?>

			</ul>
			<div class="single--apartment__schema">
				<?php
					$schema = wp_get_attachment_image_src( get_post_meta($post->ID, '_meta_schema_id', true), '', FALSE);
					?>
				<a class="popup-zoom" href="<?php echo $schema[0]; ?>">
					<img src="<?php echo $schema[0]; ?>" alt="Schema"/>
				</a>
			</div>
			<a href="#contactblock" data-toggle="collapse" class="btn" aria-expanded="false" aria-controls="contactblock">Meld din interesse!</a>
		</div>
	
	</div>
</div>
<?php endwhile; ?>
