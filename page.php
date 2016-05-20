<?php
/**
 * The template for displaying all pages.
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package ysgoltrewen
 */

get_header(); ?>

<main role="main">

	<header>
		<h1><?php single_post_title(); ?></h1>
	</header>

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
