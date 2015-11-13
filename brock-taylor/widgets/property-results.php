<?php
/**
 * Created by PhpStorm.
 * User: TimLockwood
 * Date: 16/09/2015
 * Time: 16:38
 */

class BW_Widget_PropertyResults extends WP_Widget {
    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        // widget actual processes
        parent::__construct(
            'BW_Widget_PropertyResults',
            __('Britweb Property Results', 'text_domain'),
            array('description'=>__('Provides search results associated with a property filter'))
        );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     *
     */
    public function widget( $args, $instance ) {

        global $wpdb;

        if(!array_key_exists('price-min', $_GET)
            || !array_key_exists('price-max', $_GET)
            || !array_key_exists('beds', $_GET)
            || !array_key_exists('location', $_GET)
            || !array_key_exists('distance', $_GET))
        {
            return;
        }

        $filters = [
            'price-min'=>intval($_GET['price-min']),
            'price-max'=>intval($_GET['price-max']),
            'beds'=>intval($_GET['beds']),
            'location'=>sanitize_text_field($_GET['location']),
            'distance'=>intval($_GET['distance'])
        ];

        $sort = array_key_exists('sort', $_GET) ? sanitize_text_field($_GET['sort']) : 'distance';
        $sortDir = array_key_exists('sortdir', $_GET) ? sanitize_text_field($_GET['sortdir']) : 'asc';
        $page = array_key_exists('page', $_GET) ? intval($_GET['page']) : 1;

        require_once(get_stylesheet_directory().'/includes/Geocoder.php');
        $geocoder = new Geocoder;

        $location = $geocoder->getLocation($filters['location']);

        $sql = "
            SELECT DISTINCT
              $wpdb->posts.ID as post_id,
              CAST(price.meta_value AS UNSIGNED) AS price,
              beds.meta_value AS beds,
              latitude.meta_value AS latitude,
              longitude.meta_value AS longitude,
              p.distance_unit * DEGREES(
                ACOS(
                  COS(RADIANS(p.latpoint)) * COS(RADIANS(latitude.meta_value)) * COS(
                    RADIANS(
                      p.longpoint - longitude.meta_value
                    )
                  ) + SIN(RADIANS(p.latpoint)) * SIN(RADIANS(latitude.meta_value))
                )
              ) AS distance
            FROM
              $wpdb->posts
              INNER JOIN $wpdb->postmeta beds
                ON beds.post_id = $wpdb->posts.ID
                AND beds.meta_key = 'wpcf-bedrooms'
              INNER JOIN $wpdb->postmeta price
                ON price.post_id = $wpdb->posts.ID
                AND price.meta_key = 'wpcf-price'
              INNER JOIN $wpdb->postmeta latitude
                ON latitude.post_id = $wpdb->posts.ID
                AND latitude.meta_key = 'wpcf-latitude'
              INNER JOIN $wpdb->postmeta longitude
                ON longitude.post_id = $wpdb->posts.ID
                AND longitude.meta_key = 'wpcf-longitude'
              JOIN
                (SELECT
                  {$location['lat']} AS latpoint,
                  {$location['lng']} AS longpoint,
                  {$filters['distance']} AS radius,
                  69.0 AS distance_unit) AS p
                ON 1 = 1
            WHERE latitude.meta_value BETWEEN p.latpoint - (p.radius / p.distance_unit)
              AND p.latpoint + (p.radius / p.distance_unit)
              AND longitude.meta_value BETWEEN p.longpoint - (
                p.radius / (
                  p.distance_unit * COS(RADIANS(p.latpoint))
                )
              )
              AND p.longpoint + (
                p.radius / (
                  p.distance_unit * COS(RADIANS(p.latpoint))
                )
              )
              AND $wpdb->posts.post_type = 'sale-property'
              AND beds.meta_value >= {$filters['beds']}
              AND price.meta_value BETWEEN {$filters['price-min']}
              AND {$filters['price-max']}
            ORDER BY $sort $sortDir
        ";

        $properties = $wpdb->get_results($sql);

        require(get_stylesheet_directory().'/property-results-widget-template.php');
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
        // outputs the options form on admin
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     */
    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
    }

}

add_action('widgets_init', function () {
    register_widget('BW_Widget_PropertyResults');
});