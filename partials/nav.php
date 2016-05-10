<?php
/**
 * <nav> template part
 * @link https://developer.wordpress.org/reference/functions/get_template_part/
 * @package ysgoltrewen
 */
?>

<nav class="nav" role="navigation">
	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
</nav>
