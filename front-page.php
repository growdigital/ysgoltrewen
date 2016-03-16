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
			<?php the_field('initial_text'); ?>
			<?php if( have_rows('image-text') ): ?>
				<?php while( have_rows('image-text') ): the_row();
					// vars
					$image = get_sub_field('image');
					$caption = get_sub_field('caption');
					$text = get_sub_field('text');
					?>
					<figure>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
						<figcaption><?php echo $caption; ?></figcaption>
					</figure>
					<?php echo $text; ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</article>
	<?php endwhile; ?>
</main>

<?php
get_sidebar();
get_footer();
?>
