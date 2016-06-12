<?php
/**
 * The template for displaying the dates page.
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
					<?php echo $text; ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</article>
	<?php endwhile; ?>

		<article class="article u-indent">
			<h2><?php _e( 'Term dates', 'ysgoltrewen' ); ?></h2>
			<?php
				if( have_rows('term_dates', 'option') ):
					while ( have_rows('term_dates', 'option') ) : the_row(); ?>
						<h3><?php the_sub_field('term_name', 'option'); ?></h3>
						<p><?php the_sub_field('term_start', 'option'); ?><br>
						<strong><?php _e( 'Half term', 'ysgoltrewen' ); ?>: </strong><?php the_sub_field('half_term_start', 'option'); ?> – <?php the_sub_field('half_term_end', 'option'); ?><br>
						<?php the_sub_field('term_end', 'option'); ?></p>
			<?php	endwhile;
				else :
				endif;
			?>
		</article>
		<article class="article u-indent">
		<?php if( have_rows('inset', 'option') ): ?>
			<h2><?php _e( 'Inset days', 'ysgoltrewen' ); ?></h2>
			<p>(<?php _e( 'Directed teachers’ closure days', 'ysgoltrewen' ); ?>)</p>
			<ul>
			<?php	while ( have_rows('inset', 'option') ) : the_row(); ?>
					<li><?php the_sub_field('inset_date', 'option'); ?></li>
			<?php	endwhile; ?>
			</ul>
		<?php
			else :
			endif;
		?>
		</article>

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
