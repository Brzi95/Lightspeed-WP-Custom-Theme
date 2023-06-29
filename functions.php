<?php 

/**
 * Officebite Theme functions and definitions
 * 
 * @package Officebite Theme
 */

/**
 * Register Custom Navigation Walker
 */

require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

add_filter( 'nav_menu_link_attributes', 'bootstrap5_dropdown_fix' );
function bootstrap5_dropdown_fix( $atts ) {
     if ( array_key_exists( 'data-toggle', $atts ) ) {
         unset( $atts['data-toggle'] );
         $atts['data-bs-toggle'] = 'dropdown';
     }
     return $atts;
}


require_once get_template_directory() . '/inc/customizer.php';


/* Include WooCommerce modifications */
if(class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/wc-modifications.php';
}

function officebite_scripts() {
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/custom-js.js', array(), '1.0', true);
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.3.1', true);
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '5.3.0', 'all');
    wp_enqueue_style('archive-page', get_template_directory_uri() . '/css/custom/archive-page.css', array(), '1.0', 'all');
    wp_enqueue_style('header', get_template_directory_uri() . '/css/custom/header.css', array(), '1.0', 'all');
    wp_enqueue_style('footer', get_template_directory_uri() . '/css/custom/footer.css', array(), '1.0', 'all');
    wp_enqueue_style('officebite-css', get_stylesheet_uri(), array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'officebite_scripts');

// image lazy load
function add_lazy_loading_attribute($attr, $attachment, $size) {
    $attr['loading'] = 'lazy';
    return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'add_lazy_loading_attribute', 10, 3);

function officebite_config() {
    register_nav_menus(
        array(
            'officebite_main_menu'   => esc_html__('Officebite Main Menu', 'officebite'),
            'officebite_footer_menu' => esc_html__('Officebite Footer Menu', 'officebite'),
        )
    );

    /**
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on Officebite, use a find and replace
     * to change 'officebite' to the name of your theme in all the files
     */
    $textdomain = 'officebite';
    load_theme_textdomain($textdomain, get_stylesheet_directory() . '/languages/');
    load_theme_textdomain($textdomain, get_template_directory() . '/languages/');

    add_theme_support('woocommerce', array(
        'thumbnail_image_width' => 255,
        'single_image_width'    => 255,
        'default_rows'          => 10,
        'min_rows'              => 5,
        'max_rows'              => 10,
        'default_columns'       => 1,
        'min_columns'           => 1,
        'max_columns'           => 1
    ));

    add_theme_support('post-thumbnails');
    add_image_size('officebite_blog', 960, 640, array('center', 'center'));
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    add_theme_support('custom-logo', array(
        'flex-height' => true,
        'flex-width'  => true
    ));

    if(!isset($content_width)) {
        $content_width = 600;
    }

    add_theme_support('title-tag');

}
add_action('after_setup_theme', 'officebite_config', 0);


/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'officebite_woocommerce_header_add_to_cart_fragment' );

function officebite_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<span class="items"> <?php echo WC()->cart->get_cart_contents_count(); ?> </span>
	<?php
	$fragments['span.items'] = ob_get_clean();
	return $fragments;
}

add_action('widgets_init', 'officebite_sidebars');
function officebite_sidebars() {
    register_sidebar(array(
        'name'           =>  esc_html__('Officebite Main Sidebar', 'officebite'),
        'id'             =>  'officebite-sidebar-1',
        'description'    =>  esc_html__('Drag and drop your widgets here', 'officebite'),
        'before_widget'  =>  '<div id="%1$s" class="widget %2$s widget-wrapper">',
        'after_widget'   =>  '</div>',
        'before_title'   =>  '<h4 class="widget-title">',
        'after_title'    =>  '</h4>',
    ));
    register_sidebar(array(
        'name'           =>  esc_html__('Sidebar Shop', 'officebite'),
        'id'             =>  'officebite-sidebar-shop',
        'description'    =>  esc_html__('Drag and drop your WooCommerce widgets here', 'officebite'),
        'before_widget'  =>  '<div id="%1$s" class="widget %2$s widget-wrapper">',
        'after_widget'   =>  '</div>',
        'before_title'   =>  '<h4 class="widget-title">',
        'after_title'    =>  '</h4>',
    ));
    register_sidebar(array(
        'name'           =>  esc_html__('Footer Sidebar 1', 'officebite'),
        'id'             =>  'officebite-sidebar-footer-1',
        'description'    =>  esc_html__('Drag and drop your widgets here', 'officebite'),
        'before_widget'  =>  '<div id="%1$s" class="widget %2$s widget-wrapper">',
        'after_widget'   =>  '</div>',
        'before_title'   =>  '<h4 class="widget-title">',
        'after_title'    =>  '</h4>',
    ));
    register_sidebar(array(
        'name'           =>  esc_html__('Footer Sidebar 2', 'officebite'),
        'id'             =>  'officebite-sidebar-footer-2',
        'description'    =>  esc_html__('Drag and drop your widgets here', 'officebite'),
        'before_widget'  =>  '<div id="%1$s" class="widget %2$s widget-wrapper">',
        'after_widget'   =>  '</div>',
        'before_title'   =>  '<h4 class="widget-title">',
        'after_title'    =>  '</h4>',
    ));
    register_sidebar(array(
        'name'           =>  esc_html__('Footer Sidebar 3', 'officebite'),
        'id'             =>  'officebite-sidebar-footer-3',
        'description'    =>  esc_html__('Drag and drop your widgets here', 'officebite'),
        'before_widget'  =>  '<div id="%1$s" class="widget %2$s widget-wrapper">',
        'after_widget'   =>  '</div>',
        'before_title'   =>  '<h4 class="widget-title">',
        'after_title'    =>  '</h4>',
    ));
}
