<?php
/**
 * Displays all of the <head> section and everything up until <!-- site-content --> div
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package ysgoltrewen
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
  	<meta content="width=device-width,minimum-scale=1.0" name="viewport">
  	<title><?php bloginfo( 'name' ); ?><?php if ( is_home() ) { } else { echo " : "; } ?><?php wp_title(''); ?></title>
		<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/dist/assets/img/favicon.png">
		<link type="text/plain" rel="author" href="<?php echo get_template_directory_uri(); ?>/dist/humans.txt">

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<header class="header"><!-- site-header -->
			<a class="header--logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri (); ?>/dist/assets/img/logo.svg" alt="Ysgol Trewen logo"></a></h1>
			<div>
				<h1 class="header--name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="header--desc"><?php echo html_entity_decode(get_bloginfo('description'));?></h2>
			</div>
		</header>
		<nav class="nav" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav>
		<div class="container"><!-- site-content -->
