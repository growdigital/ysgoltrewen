<?php
/**
 * The main (default) template file.
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package ysgoltrewen
 */

get_header(); ?>

<main role="main">
	<h1><?php single_post_title(); ?></h1>
	<p><?php the_tags( 'Tags: ', ', ', '<br>' ); ?></p>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class(); ?>>
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<?php the_post_thumbnail('thumbnail'); ?>
			<?php the_excerpt(); ?>
		</article>
	<?php endwhile; ?>
</main>

<?php
get_sidebar();
get_footer();
?>
