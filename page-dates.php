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
					<?php echo $text; ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</article>
	<?php endwhile; ?>

		<section>
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
		</section>
		<section>
		<?php if( have_rows('inset', 'option') ): ?>
			<h2>Inset days</h2>
			<p>(Directed teachers’ closure days)</p>
			<ul>
			<?php	while ( have_rows('inset', 'option') ) : the_row(); ?>
					<li><?php the_sub_field('inset_date', 'option'); ?></li>
			<?php	endwhile; ?>
			</ul>
		<?php
			else :
			endif;
		?>
		</section>

</main>

<?php
get_sidebar();
get_footer();
?>

<?php
/*
Template Name: Date Page
*/
?>
