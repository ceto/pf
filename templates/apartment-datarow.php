<p class="datarow">
	<a id="ap-<?= get_the_ID();  ?>" class="datarow--link state-" href="<?php the_permalink(); ?>" tiltle="<?php the_title(); ?>">
		<span class="datarow--cell">
			<?php the_title(); ?>
		</span>
		<span class="datarow--cell">
			<?php echo get_post_meta( $post->ID, '_meta_rom', true ); ?>-roms
		</span>
		<span class="datarow--cell">
			<?php echo get_post_meta( $post->ID, '_meta_floor', true ); ?>
		</span>
		<span class="datarow--cell">
			<?php echo get_post_meta( $post->ID, '_meta_bra', true ); ?> m<sup>2</sup>
		</span>
		<span class="datarow--cell">
			<?php echo get_post_meta( $post->ID, '_meta_prom', true ); ?> m<sup>2</sup>
		</span>
		<span class="datarow--cell">
			<?php echo get_post_meta( $post->ID, '_meta_bod', true ); ?> m<sup>2</sup>
		</span>
		<?php if (get_post_meta( $post->ID, '_meta_state', true )=='fri') : ?>
		<span class="datarow--cell">
			<?php echo number_format(get_post_meta( $post->ID, '_meta_pris', true ), 0, ',', ' '); ?> NOK
		</span>
		<?php else : ?>
		<span class="datarow--cell">
			<?php echo get_post_meta( $post->ID, '_meta_state', true ); ?>
		</span>
		<?php endif; ?>

	</a>
</p>
