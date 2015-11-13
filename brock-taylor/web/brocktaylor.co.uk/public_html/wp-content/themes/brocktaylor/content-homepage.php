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


<div class="home-content-container">
<?php the_field('homepage_content_one'); ?>
</div>

<?php if( have_rows('homepage_photo_grid') ): ?>

	<div class="homepage-photo-grid">

	<?php while( have_rows('homepage_photo_grid') ): the_row();

		// vars
		$grid_image = get_sub_field('image');
		$grid_heading = get_sub_field('heading');
		$grid_content = get_sub_field('content');
		$grid_link = get_sub_field('link');

		?>

				<div class="photo-grid-item" style="background-image:url('<?php echo $grid_image; ?>');"><div class="photo-grid-overlay"><?php if( $grid_heading ): echo '<h2 class="photo-grid-heading">'. $grid_heading .'</h2>'; endif; ?>
				<div class="photo-grid-content"><?php echo $grid_content; ?></div><a class="photo-grid-link" <?php if($grid_link) { echo 'href="'.$grid_link.'"'; } ?>>Read More</a></div></div>

	<?php endwhile; ?>

	</ul>

<?php endif; ?>

<?php echo do_shortcode('[wolf_tweet username="BrockTaylor1" type="single" count="3"]'); ?>

<div id="homepage-section-2" class="siteorigin-panels-stretch panel-row-style-full-width panel-row-style" data-stretch-type="full">
<div class="home-content-container">
<?php the_field('homepage_content_two'); ?>
</div>
<div id="homepage-vis-editor"><?php echo do_shortcode('[wpv-view name="Featured Properties Slider"]'); ?><?php  //the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'vantage' ) ); ?></div>
</div>


			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'vantage' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->

		<?php do_action('vantage_entry_main_bottom') ?>

	</div>


</article><!-- #post-<?php the_ID(); ?> -->
