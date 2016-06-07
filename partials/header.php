<?php
/**
 * <header> template part
 * @link https://developer.wordpress.org/reference/functions/get_template_part/
 * @package ysgoltrewen
 */
?>

<header class="header l-header"><!-- site-header -->
	<a class="header__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri (); ?>/dist/assets/img/logo.svg" alt="<?php _e( 'Ysgol Trewen logo', 'ysgoltrewen' ); ?>"></a></h1>
	<div>
		<h1 class="header__name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<h2 class="header__desc"><?php echo html_entity_decode(get_bloginfo('description'));?></h2>
	</div>
</header>
