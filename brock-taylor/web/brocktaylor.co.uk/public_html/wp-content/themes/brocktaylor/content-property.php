<?php
/**
 * Displays 
 * 
 * @package vantage
 * @since vantage 1.0
 * @license GPL 2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>

	<div class="entry-main">

		<?php do_action('vantage_entry_main_top') ?>

		<header class="entry-header">

			<?php if( has_post_thumbnail() && siteorigin_setting('blog_featured_image') ): ?>
				<div class="entry-thumbnail"><?php the_post_thumbnail( is_active_sidebar('sidebar-1') ? 'post-thumbnail' : 'vantage-thumbnail-no-sidebar' ) ?></div>
			<?php endif; ?>

			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'vantage' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

			<?php if ( siteorigin_setting( 'blog_post_metadata' ) && get_post_type() == 'post' ) : ?>
				<div class="entry-meta">
					<?php vantage_posted_on(); ?>
				</div><!-- .entry-meta -->
			<?php endif; ?>

		</header><!-- .entry-header -->

		<div class="entry-content">

			<div id="tab-1" class="property-tab-content current"><!-- Custom tabbed content 1 -->
				<?php the_content('Read more...'); ?>
			</div><!-- Custom tabbed content 1 END -->

			<?php
			$maps_latitude = types_render_field("latitude", array("raw"=>"true"));
			$maps_longitude = types_render_field("longitude", array("raw"=>"true"));
			?>

			<div id="tab-2" class="property-tab-content"><!-- Custom tabbed content 2 -->
				<?php echo do_shortcode('[gallery option1="value1" size="medium" columns="3"]'); ?>
			</div><!-- Custom tabbed content 2 END -->

			<div id="tab-3" class="property-tab-content"><!-- Custom tabbed content 3 -->
			</div><!-- Custom tabbed content 3 END -->

			<div id="tab-4" class="property-tab-content"><!-- Custom tabbed content 4 -->
				<script type="text/javascript" src="http://www.webestools.com/google_map_gen.js?lati=<?php echo $maps_latitude ?>&long=<?php echo $maps_longitude ?>&zoom=15&width=675&height=400&mapType=normal&map_btn_normal=yes&map_btn_satelite=yes&map_btn_mixte=yes&map_small=yes&marqueur=yes&info_bulle="></script><br /><a href="http://www.webestools.com/google-maps-code-generator-insert-map-on-website-javascript-free-google-map-script.html">Google Maps code Generator</a>
			</div><!-- Custom tabbed content 4 END -->


			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'vantage' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->


		<?php do_action('vantage_entry_main_bottom') ?>

	</div>

</article><!-- #post-<?php the_ID(); ?> -->
