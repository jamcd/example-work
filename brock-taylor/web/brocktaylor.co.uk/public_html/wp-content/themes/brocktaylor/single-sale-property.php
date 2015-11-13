<?php
/**
 * The Template for displaying all single posts.
 *
 * @package vantage
 * @since vantage 1.0
 * @license GPL 2.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'property' ); ?>

		<?php if( siteorigin_setting('navigation_post_nav') ) vantage_content_nav( 'nav-below' ); ?>

		<?php if ( comments_open() || '0' != get_comments_number() ) : ?>
			<?php comments_template( '', true ); ?>
		<?php endif; ?>

	<?php endwhile; // end of the loop. ?>

	</div><!-- #content .site-content -->
</div><!-- #primary .content-area -->



<div id="secondary" class="widget-area" role="complementary">
	<a class="arrange-viewing-button" href="#">Arrange A Viewing</a>
	<a class="make-offer-button" href="#">Request A Callback</a>
	<div class="property-social cf">
		<div class="share-text">Share this property:</div>
		<div class="share-icons">
			<a href="" target="_blank"><i class="fa fa-facebook-square"></i></a>
			<a href="" target="_blank"><i class="fa fa-twitter-square"></i></a>
			<a href="" target="_blank"><i class="fa fa-google-plus-square"></i></a>
			<a href="" target="_blank"><i class="fa fa-envelope-square"></i></a>
		</div>
	</div>
  <?php get_template_part( 'single-property', 'mortgage-calculator' ); ?>
	<div class="prop-cta">
	  <p>Interested in this property?</p>
	  <p>Call us on <a href="tel:01403272022">01403 272022</a></p>
	</div>
</div>

<?php get_footer(); ?>
