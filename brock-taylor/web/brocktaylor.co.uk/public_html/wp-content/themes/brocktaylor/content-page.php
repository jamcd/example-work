<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package vantage
 * @since vantage 1.0
 * @license GPL 2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-main">

		<?php do_action('vantage_entry_main_top') ?>

		<header class="entry-header">
			<!-- REMOVED TITLE -->
			<?php if ( siteorigin_setting( 'blog_post_metadata' ) ) : ?>
			<div class="entry-meta">
				<?php vantage_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">

			<div id="quick-search-section" class="siteorigin-panels-stretch panel-row-style-full-width panel-row-style" data-stretch-type="full">

				<h2 class="search-headline"><span class="search-title">Search for a property </span><span class="subtitle">in Horsham and the surrounding villages</span></h2>
				<div class="search-button">
					<a href="/search-for-properties" id="quick-search-button" class="quick-search-button visible">Quick Search</a>
					<a href="/search-for-properties" id="close-quick-search-button" class="quick-search-button">Close Quick Search</a>
				</div>

				<div class="quick-search-container" id="quick-search">
					<?php the_widget( "BW_Widget_PropertyFilter", $instance, $args ); ?>
				</div>

			</div>

			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'vantage' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'vantage' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->

		<?php do_action('vantage_entry_main_bottom') ?>

	</div>

</article><!-- #post-<?php the_ID(); ?> -->
