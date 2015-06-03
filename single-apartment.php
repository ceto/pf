<?php
/**
 * Template Name: Single Apartment
 */
?>
<?php while (have_posts()) : the_post(); ?>
<div id="container" class="container" role="main">
	<div class="wrapper wrapper--wide">
		
		<div class="single--apartment__alaprajz">
			<img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/alaprajz.png" alt="Alaprajz">
		</div>
		
		<div class="single--apartment__adatok">
			<header class="single--apartment__head">
				<h1 class="single--apartment__title">Leilighetsnr<span>304</span></h1>
			</header>
			<ul class="datapanel single--apartment__datapanel">
				<li class="datapanel__item"><span>Navn</span>304</li>
				<li class="datapanel__item"><span>Etasje</span>2</li>
				<li class="datapanel__item"><span>BRA</span>78 m<sup>2</sup></li>
				<li class="datapanel__item"><span>Rom</span>3-roms</li>
				<li class="datapanel__item"><span>Klesbod</span>12 m<sup>2</sup></li>
				<li class="datapanel__item"><span>Balkong</span>5 m<sup>2</sup></li>
				<li class="datapanel__item"><span>Pris / Staus</span>827 000 NOK</li>
			</ul>
			<div class="single--apartment__schema">
				<img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/schema.png" alt="Schema">
			</div>
			<a href="#contactblock" class="btn">Meld din interesse!</a>
		</div>
	
	</div>
</div>
<?php endwhile; ?>
