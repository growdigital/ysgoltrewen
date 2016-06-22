<?php
/**
 * The template for displaying all pages.
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package ysgoltrewen
 */

get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
	<h1><?php the_title(); ?></h1>
<?php endwhile; ?>

<main class="main l-main" role="main">
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class('article'); ?>>
			<?php if( have_rows('image-text') ): ?>
				<?php while( have_rows('image-text') ): the_row();
					// vars
					$image = get_sub_field('image');
					$img_srcset = wp_get_attachment_image_srcset( $image['id'], 'full' );
					$img_src = wp_get_attachment_image_url( $image['id'], 'full' );
					$caption = get_sub_field('caption');
					$text = get_sub_field('text');
					?>
					<figure class="container__full">
						<img srcset="<?php echo $img_srcset; ?>"
								 sizes="(min-width: 45em) 63.1vw, 100vw"
								 src="<?php echo $image['sizes']['small']; ?>"
								 alt="<?php echo $image['alt']; ?>">
						<figcaption class="container__full-indent"><?php echo $caption; ?></figcaption>
					</figure>
					<?php
					if( $text ) {
							echo $text;
					}
					else {}
					?>
				<?php endwhile; ?>
			<?php endif; ?>
		</article>
	<?php endwhile; ?>
</main>

<?php
get_sidebar();
get_footer();
?>
