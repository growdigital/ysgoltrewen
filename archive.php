<?php
/**
 * The template for displaying archive pages.
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package ysgoltrewen
 */

get_header(); ?>

<h1 style="color:red;">Archive template</h1>

<main role="main">

	<?php
	if ( have_posts() ) : ?>
		<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
		<?php
		/* Start the Loop */
		while ( have_posts() ) : the_post();
			/*
			 * Include the Post-Format-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
			 */
			get_template_part( 'template-parts/content', get_post_format() );
		endwhile;
		the_posts_navigation();

	else :
		get_template_part( 'template-parts/content', 'none' );
	endif; ?>

</main>

<?php
get_sidebar();
get_footer();
?>