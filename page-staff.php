<?php
/**
 * The template for displaying all pages.
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package ysgoltrewen
 */

get_header(); ?>

<main role="main">

	<section class="pagepad">
		<h1><?php single_post_title(); ?></h1>
		<?php
			if( have_rows('member') ): ?>
				<ul>
				<?php while ( have_rows('member') ) : the_row(); ?>
					<li>
						<h2><?php the_sub_field('name'); ?></h2>
						<h3><?php the_sub_field('title'); ?></h3>
						<img src="<?php the_sub_field('photo'); ?>" alt="Photograph of <?php the_sub_field('name'); ?>" />
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
