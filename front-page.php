<?php
/**
 * The template for displaying the front page.
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package ysgoltrewen
 */

get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
	<h1><?php the_title(); ?></h1>
<?php endwhile; ?>

<main class="main" role="main">
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class('article'); ?>>
			<?php if( have_rows('image-text') ): ?>
				<?php while( have_rows('image-text') ): the_row();
					// vars
					$image = get_sub_field('image');
					$caption = get_sub_field('caption');
					$text = get_sub_field('text');
					?>
					<figure class="container__full">
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
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
	<article class="article">
		<h2>Term dates</h2>
		<?php
			if( have_rows('term_dates', 'option') ):
				while ( have_rows('term_dates', 'option') ) : the_row(); ?>
					<h3><?php the_sub_field('term_name', 'option'); ?></h3>
					<p><?php the_sub_field('term_start', 'option'); ?><br>
					<strong>Half term: </strong><?php the_sub_field('half_term_start', 'option'); ?> – <?php the_sub_field('half_term_end', 'option'); ?><br>
					<?php the_sub_field('term_end', 'option'); ?></p>
		<?php	endwhile;
			else :
			endif;
		?>
	</article>
</main>

<?php
get_sidebar();
get_footer();
?>
