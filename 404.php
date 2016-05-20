<?php
/**
 * The template for displaying 404 pages (not found).
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 * @package ysgoltrewen
 */

get_header(); ?>

<main role="main">

	<h1><?php _e( 'That page can’t be found.', 'ysgoltrewen' ); ?></h1>
	<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'ysgoltrewen' ); ?> </p>
	<?php get_search_form(); ?>

</main><!-- #main -->

<?php get_footer(); ?>


