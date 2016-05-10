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
	<?php get_template_part( 'partials/header' ); ?>
	<?php get_template_part( 'partials/nav' ); ?>
		<div class="container"><!-- site-content -->
