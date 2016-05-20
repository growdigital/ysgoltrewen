<?php
/**
 * The template for displaying comments.
 * This is the template that displays the area of the page that contains both
 * the current comments and the comment form.
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package ysgoltrewen
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div>
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2>
			<?php
				printf( // WPCS: XSS OK.
					_nx( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title'),
					number_format_i18n( get_comments_number() ),
					get_the_title()
				);
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav role="navigation">
			<h2 class="screen-reader-text">Comment navigation</h2>
			<div>
				<div><?php previous_comments_link( 'Older Comments' ); ?></div>
				<div><?php next_comments_link( 'Newer Comments' ); ?></div>
			</div>
		</nav>
		<?php endif; // Check for comment navigation. ?>
		<ol>
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
				) );
			?>
		</ol>
		<?php
	endif; // Check for have_comments().

	// If comments are closed and there are comments, leave a note
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p>Comments are closed.</p>
	<?php
	endif;
	comment_form();
	?>
</div><!-- /comments -->
