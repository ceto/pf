<?php
	global $gview;

	$ap['rom'] = get_post_meta( $post->ID, '_meta_rom', true ).'-roms';
	$ap['floor'] = get_post_meta( $post->ID, '_meta_floor', true );
	$ap['bra'] = get_post_meta( $post->ID, '_meta_bra', true ).' m<sup>2</sup>';
	$ap['prom'] = get_post_meta( $post->ID, '_meta_prom', true ).' m<sup>2</sup>';
	$ap['bod'] = get_post_meta( $post->ID, '_meta_bod', true ).' m<sup>2</sup>';
	$ap['pris'] = number_format(get_post_meta( $post->ID, '_meta_pris', true ), 0, ',', ' ').' NOK';
	$ap['state'] = get_post_meta( $post->ID, '_meta_state', true );
	$ap['svgdata1'] = get_post_meta( $post->ID, '_meta_svgdata1', true );
	$ap['svgdata2'] = get_post_meta( $post->ID, '_meta_svgdata1', true );
	
	switch ($gview) {
		case 1:
			$ap['svgdata'] = get_post_meta( $post->ID, '_meta_svgdata1', true );
			break;
		case 2:
			$ap['svgdata'] = get_post_meta( $post->ID, '_meta_svgdata2', true );
			break;
		
		default:
			$ap['svgdata'] = get_post_meta( $post->ID, '_meta_svgdata1', true );
			break;
	}



?>

<p class="datarow">
	<a id="ap-<?= get_the_ID();  ?>" class="datarow--link state-<?= $ap['state']; ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" 
	data-name="<?php the_title(); ?>"
	data-rom="<?= $ap['rom']; ?>"
	data-floor="<?= $ap['floor']; ?>"
	data-bra="<?= $ap['bra']; ?>"
	data-prom="<?= $ap['prom']; ?>"
	data-bod="<?= $ap['bod']; ?>"
	data-pris="<?= $ap['pris']; ?>"
	data-state="<?= $ap['state']; ?>"
	data-svgdata="<?= $ap['svgdata']; ?>"
	data-svgdata1="<?= $ap['svgdata1']; ?>"
	data-svgdata2="<?= $ap['svgdata2']; ?>"
	data-url="<?php the_permalink(); ?>"
	>
		<span class="datarow--cell"><?php the_title(); ?></span>
		<span class="datarow--cell"><?= $ap['rom']; ?></span>
		<span class="datarow--cell"><?= $ap['floor']; ?></span>
		<span class="datarow--cell"><?= $ap['bra']; ?></span>
		<span class="datarow--cell"><?= $ap['prom']; ?></span>
		<span class="datarow--cell"><?= $ap['bod']; ?></span>
		<?php if ( $ap['state'] == 'fri' ) : ?>
			<span class="datarow--cell"><i class="fri"></i><?= $ap['pris'] ; ?></span>
		<?php else : ?>
			<span class="datarow--cell"><i class="<?= $ap['state'] ?>"></i><?= $ap['state'] ?></span>
		<?php endif; ?>
	</a>
</p>
