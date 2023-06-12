<?php 

/**
 * Lightspeed Theme functions and definitions
 * 
 * @package Lightspeed Theme
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

function lightspeed_scripts() {
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/custom-js.js', array(), '1.0', true);
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.3.1', true);
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '5.3.0', 'all');
    wp_enqueue_style('lightspeed-css', get_stylesheet_uri(), array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'lightspeed_scripts');

// image lazy load
function add_lazy_loading_attribute($attr, $attachment, $size) {
    $attr['loading'] = 'lazy';
    return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'add_lazy_loading_attribute', 10, 3);

function lightspeed_config() {
    register_nav_menus(
        array(
            'lightspeed_main_menu'   => esc_html__('Lightspeed Main Menu', 'lightspeed'),
            'lightspeed_footer_menu' => esc_html__('Lightspeed Footer Menu', 'lightspeed'),
        )
    );

    /**
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on Lightspeed, use a find and replace
     * to change 'lightspeed' to the name of your theme in all the files
     */
    $textdomain = 'lightspeed';
    load_theme_textdomain($textdomain, get_template_directory() . '/languages/');
    load_theme_textdomain($textdomain, get_stylesheet_directory() . '/languages/');

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
    add_image_size('lightspeed_blog', 960, 640, array('center', 'center'));
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
add_action('after_setup_theme', 'lightspeed_config', 0);


/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'lightspeed_woocommerce_header_add_to_cart_fragment' );

function lightspeed_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<span class="items"> <?php echo WC()->cart->get_cart_contents_count(); ?> </span>
	<?php
	$fragments['span.items'] = ob_get_clean();
	return $fragments;
}

add_action('widgets_init', 'lightspeed_sidebars');
function lightspeed_sidebars() {
    register_sidebar(array(
        'name'           =>  esc_html__('Lightspeed Main Sidebar', 'lightspeed'),
        'id'             =>  'lightspeed-sidebar-1',
        'description'    =>  esc_html__('Drag and drop your widgets here', 'lightspeed'),
        'before_widget'  =>  '<div id="%1$s" class="widget %2$s widget-wrapper">',
        'after_widget'   =>  '</div>',
        'before_title'   =>  '<h4 class="widget-title">',
        'after_title'    =>  '</h4>',
    ));
    register_sidebar(array(
        'name'           =>  esc_html__('Sidebar Shop', 'lightspeed'),
        'id'             =>  'lightspeed-sidebar-shop',
        'description'    =>  esc_html__('Drag and drop your WooCommerce widgets here', 'lightspeed'),
        'before_widget'  =>  '<div id="%1$s" class="widget %2$s widget-wrapper">',
        'after_widget'   =>  '</div>',
        'before_title'   =>  '<h4 class="widget-title">',
        'after_title'    =>  '</h4>',
    ));
    register_sidebar(array(
        'name'           =>  esc_html__('Footer Sidebar 1', 'lightspeed'),
        'id'             =>  'lightspeed-sidebar-footer-1',
        'description'    =>  esc_html__('Drag and drop your widgets here', 'lightspeed'),
        'before_widget'  =>  '<div id="%1$s" class="widget %2$s widget-wrapper">',
        'after_widget'   =>  '</div>',
        'before_title'   =>  '<h4 class="widget-title">',
        'after_title'    =>  '</h4>',
    ));
    register_sidebar(array(
        'name'           =>  esc_html__('Footer Sidebar 2', 'lightspeed'),
        'id'             =>  'lightspeed-sidebar-footer-2',
        'description'    =>  esc_html__('Drag and drop your widgets here', 'lightspeed'),
        'before_widget'  =>  '<div id="%1$s" class="widget %2$s widget-wrapper">',
        'after_widget'   =>  '</div>',
        'before_title'   =>  '<h4 class="widget-title">',
        'after_title'    =>  '</h4>',
    ));
    register_sidebar(array(
        'name'           =>  esc_html__('Footer Sidebar 3', 'lightspeed'),
        'id'             =>  'lightspeed-sidebar-footer-3',
        'description'    =>  esc_html__('Drag and drop your widgets here', 'lightspeed'),
        'before_widget'  =>  '<div id="%1$s" class="widget %2$s widget-wrapper">',
        'after_widget'   =>  '</div>',
        'before_title'   =>  '<h4 class="widget-title">',
        'after_title'    =>  '</h4>',
    ));
}


// registering acf block types
if(function_exists('acf_register_block_type')) {
    add_action('acf/init', 'register_acf_block_types');
}

function register_acf_block_types() {
    acf_register_block_type(
        array(
            'name'              => 'toaster',
            'title'             => 'Toaster',
            'description'       => 'A custom toaster block',
            'render_template'   => '/template-parts/blocks/toaster.php',
            'icon'              => 'editor-paste-text',
            'keywords'          => array('toaster', 'product'),
        )
    );
}

// registering custom post types
function lightspeed_post_type_cars() {
    $args = array(

        'labels' => array(
            'name' => 'Cars',
            'singular_name' => 'Car'
        ),

        'public'        => true,
        'hierarchical'  => true,
        'has_archive'   => true,
        'menu_icon'     => 'dashicons-images-alt2',
        'supports'      => array('title', 'editor', 'thumbnail'),
        'rewrite'       => array('slug' => 'cars')
    );
    register_post_type('cars', $args);
}

add_action('init', 'lightspeed_post_type_cars');

function lightspeed_taxonomy_brands() {
    $args = array(

        'labels' => array(
            'name' => 'Brands',
            'singular_name' => 'Brand'
        ),

        'public'        => true,
        'hierarchical'  => true,
    );
    register_taxonomy('brands', array('cars'), $args);
}

add_action('init', 'lightspeed_taxonomy_brands');









// We're overriding the current WordPress phpmailer which sends through the server you're hosted on to send through this specific details
// add_action('phpmailer_init', 'custom_mailer');
// function custom_mailer(PHPMailer $phpmailer) {
//     $phpmailer->SetFrom('milan@byteout.com', 'Milan Ivic');
//     // $phpmailer->Host = '' - host address
//     $phpmailer->Port = 587;
//     $phpmailer->SMTPAuth = true;
//     $phpmailer->SMTPSecure = 'tls';
//     $phpmailer->Username = SMTP_LOGIN;      // defined in wp_config
//     $phpmailer->Password = SMTP_PASSWORD;
//     $phpmailer->IsSMTP();
// }
