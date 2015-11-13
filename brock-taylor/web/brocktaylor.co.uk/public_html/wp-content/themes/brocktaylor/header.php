<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package vantage
 * @since vantage 1.0
 * @license GPL 2.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=10" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action('vantage_before_page_wrapper') ?>

<div id="page-wrapper">

	<?php do_action( 'vantage_before_masthead' ); ?>

	<?php get_template_part( 'parts/masthead', apply_filters( 'vantage_masthead_type', siteorigin_setting( 'layout_masthead' ) ) ); ?>

	<?php do_action( 'vantage_after_masthead' ); ?>

	<?php //vantage_render_slider() ?>



	<!-- BRITWEB CUSTOMISATION -->

	<?php if(is_front_page()) { ?>
		<div class="home-hero-container">
			<div class="home-hero-content">
				<p>Over the last year we have sold</p>
				<p class="home-hero-impact-text">38%<span>*</span></p>
				<p>more than any other agent</p>
				<div class="home-hero-link">
					<a href="#">Find Out Why</a>
				</div>
			</div>
		</div>
	<?php } else if ( is_page_template( 'templates/template-full.php' ) ) { // Returns true when 'full' template is being used ?>
		<div class="template-full-header">
			<h1><?php echo get_the_title(); ?></h1>
		</div>
	<?php } ?>




	<?php do_action( 'vantage_before_main_container' ); ?>

	<div id="main" class="site-main">
		<div class="full-container">
			<?php do_action( 'vantage_main_top' ); ?>