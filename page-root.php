<?php
/**
 * The template for displaying the root page, a WPML page for choosing language
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package ysgoltrewen
 */
?>

<?php get_template_part( 'partials/head' ); ?>

<div class="root">

	<header class="root__header">
		<img src="<?php echo get_template_directory_uri (); ?>/dist/assets/img/logo.svg" alt="Ysgol Trewen logo">
		<h1>Ysgol&nbsp;Gynradd <strong>Trewen</strong> Primary&nbsp;School</h1>
	</header>

	<main role="main">
		<ul class="root__choice">
			<li><a href="/cy/">Cymraeg</a></li>
			<li><a href="/en/">English</a></li>
		</ul>
	</main>

	<footer class="root__footer" role="contentinfo">
		<ul class="root__footnav">
			<li><a href="https://www.google.co.uk/maps/place/Cwm-cou,+Newcastle+Emlyn,+Ceredigion+SA38+9PE/@52.0488836,-4.4758037,14z/data=!4m2!3m1!1s0x486f2387f43fcef3:0x53ddfea870a93e59">Cwm Cou, SA38 9PE</a></li>
			<li><a href="tel:<?php echo the_field('tel_no', 'option') ?>"><?php echo the_field('tel_display', 'option') ?></a></li>
			<li><a href="mailto:<?php echo the_field('email', 'option') ?>"><?php echo the_field('email', 'option') ?></a></li>
			<li><a href="https://twitter.com/<?php echo the_field('twitter', 'option') ?>">@<?php echo the_field('twitter', 'option') ?></a></li>
		</ul>
	</footer>

</div>

<?php
/*
Template Name: Root Page
*/
?>
