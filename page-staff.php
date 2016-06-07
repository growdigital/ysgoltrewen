<?php
/**
 * The template for displaying the staff page
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package ysgoltrewen
 */

get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
	<h1><?php the_title(); ?></h1>
<?php endwhile; ?>

<main class="main l-main" role="main">

	<section>
		<?php
			if( have_rows('member') ): ?>
				<ul class="u-zero">
				<?php while ( have_rows('member') ) : the_row(); ?>
					<li class="media media--list">
						<div class="media__body">
							<!-- <img class="media__img" width="20%" src="<?php // the_sub_field('photo'); ?>" alt="<?php // _e( 'Photograph of', 'ysgoltrewen' ); ?> <?php // the_sub_field('name'); ?>" /> -->
							<h2><?php the_sub_field('name'); ?></h2>
							<h3><?php the_sub_field('title'); ?></h3>
						</div>
					</li>
				<?php	endwhile; ?>
				</ul>
			<?php else : endif; ?>
	</section>
</main>

<?php
get_sidebar();
get_footer();
?>

<?php
/*
Template Name: Staff Page
*/
?>
