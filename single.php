<?php
/**
 * The template for displaying all single posts.
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package ysgoltrewen
 */

get_header(); ?>

<main role="main">

	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class(); ?>>
			<h1><?php the_title(); ?></h1>
			<?php the_post_thumbnail('medium'); ?>
			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
			<?php comments_template(); ?>
		</article>
	<?php endwhile; ?>

</main>

<?php
get_sidebar();
get_footer();
?>
