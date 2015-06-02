<?php
/**
 * Template Name: Front Page
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <header class="hero">
		<div class="hero__brand">
			<a href="#">Pengeskapsfabrikken</a>
		</div>
	<div class="wrapper wrapper--wide">
		<div class="hero__text">
			<h1>Velkommen til Pengeskapsfabrikken, et nytt boligkvartal på Carl Berner!</h1>
			<a href="#contactblock" class="btn">Meld din interesse!</a>
		</div>
	</div>
</header>
<?php get_template_part('templates/header'); ?>
<section class="subcontent subcontent--penges">
	<div class="wrapper wrapper--narrow">
		<h2 class="subcontent__title">Nye, attraktive leiligheter ved Carl Berner</h2>
		<div class="subcontent__lead">
			<p>Ved siden av den tradisjonsrike Pengeskapsfabrikken på Carl Berner oppstår det snart et nytt og moderne kvartal med 2- og 3-romsleiligheter. Her får du balkong, felles uterom på bakkeplan og en rund, tøff takterrasse med flott utsikt.</p>
			<p>Halvparten av de som bor i strøket rundt Carl Berners plass er unge voksne. Ikke rart at det i området fra Carl Berner til Grünerløkka har vokst frem en mengde sjarmerende kaffebarer, microbryggerier, vinbarer og restauranter med fristende matretter fra alle verdenshjørner. I Pengeskapsfabrikken vil du i tillegg finne egne tilbydere av mat og drikke. Dette blir da et nytt tilskudd til de andre tilbudene i området.</p>
		</div>
	</div>
</section>

<section class="content content--bilder">
	<img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/homeinterior.jpg" alt="">
</section>
  
<?php endwhile; ?>
