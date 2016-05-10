<?php
/**
 * <head> template part
 * @link https://developer.wordpress.org/reference/functions/get_template_part/
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
