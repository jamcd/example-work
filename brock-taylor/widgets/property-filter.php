<?php
/**
 * Created by PhpStorm.
 * User: TimLockwood
 * Date: 16/09/2015
 * Time: 12:57
 */
class BW_Widget_PropertyFilter extends WP_Widget {
    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        // widget actual processes
        parent::__construct(
            'BW_Widget_PropertyFilter',
            __('Britweb Property Filter', 'text_domain'),
            array('description'=>__('Provides a property filter form'))
        );
    }

    protected function input($key, $default = "") {

        if(array_key_exists($key, $_GET)) {
            switch ($key) {
                case 'price-min':
                case 'price-max':
                case 'beds':
                case 'distance':
                    return intval($_GET[$key]);
                case 'location':
                case 'sortdir':
                case 'sort':
                    return sanitize_text_field($_GET[$key]);
            }
        }
        else {
            return $default;
        }
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     *
     */
    public function widget( $args, $instance ) {
        wp_enqueue_script('jquery-price-format', get_stylesheet_directory_uri().'/js/jquery.price_format.2.0.min.js', ['jquery']);
        wp_enqueue_script('property-filter', get_stylesheet_directory_uri().'/widgets/property-filter.js', ['jquery-ui-slider']);
        wp_enqueue_style('theme-jquery-ui', get_stylesheet_directory_uri().'/css/jquery-ui.min.css');
        require(get_stylesheet_directory().'/property-filter-widget-template.php');
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
    register_widget('BW_Widget_PropertyFilter');
});