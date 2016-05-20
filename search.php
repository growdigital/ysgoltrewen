<?php
/**
 * The template for displaying search results pages.
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 * @package ysgoltrewen
 */

get_header(); ?>

<main role="main">
		<?php
		if ( have_posts() ) : ?>
				<h1><?php _e( 'Search results for', 'ysgoltrewen' ); ?>: <?php printf('%s', '<span>' . get_search_query() . '</span>' ); ?></h1>
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				/**
				 * Run the loop for the search to output the results.
				 */
			endwhile;
			the_posts_navigation();
		endif; ?>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
