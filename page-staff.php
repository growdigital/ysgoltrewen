<?php
/**
 * The template for displaying the staff page
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package ysgoltrewen
 */

get_header(); ?>

<main role="main">

	<section class="pagepad">
		<h1><?php single_post_title(); ?></h1>
		<?php
			if( have_rows('member') ): ?>
				<ul class="zero">
				<?php while ( have_rows('member') ) : the_row(); ?>
					<li class="media media--list">
						<div class="media__body">
							<img class="media__img" width="20%" src="<?php the_sub_field('photo'); ?>" alt="Photograph of <?php the_sub_field('name'); ?>" />
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
