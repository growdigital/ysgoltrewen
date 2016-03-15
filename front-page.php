<?php
/**
 * The template for displaying all pages.
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package ysgoltrewen
 */

get_header(); ?>

<main class="main" role="main">
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class(); ?>>
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</article>
	<?php endwhile; ?>
</main>

<?php
get_sidebar();
get_footer();
?>
