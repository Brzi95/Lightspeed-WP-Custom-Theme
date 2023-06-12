<?php
/**
 * Template Overrides for WooCommerce pages
 * 
 * @link https://docs.woocommerce.com/document/woocommerce-theme-developer-handbook/#section-3
 * 
 * @package Lightspeed
 */

function lightspeed_wc_modify() {
    /*
    * Modify WooCommerce opening and closing HTML tags
    * We need Bootstrap-like opening/closing HTML tags
    */

    add_action('woocommerce_before_main_content', 'lightspeed_open_container_row', 5);
    function lightspeed_open_container_row() {
        echo '<div class="container shop-content"><div class="row">';
    }

    add_action('woocommerce_after_main_content', 'lightspeed_close_container_row', 5);
    function lightspeed_close_container_row() {
        echo '</div></div>';
    }



    /* Remove the main sidebar from its original position */
    remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');

    /* Add side bar to shop page and include HTML tags */
    if(is_shop()) {
        add_action('woocommerce_before_main_content', 'woocommerce_get_sidebar', 7);

        add_action('woocommerce_before_main_content', 'lightspeed_add_sidebar_tags', 6);
        function lightspeed_add_sidebar_tags() {
            echo '<div class="sidebar-shop col-lg-3 col-md-4 order-2 order-md-1">';
        }

        add_action('woocommerce_before_main_content', 'lightspeed_close_sidebar_tags', 8);
        function lightspeed_close_sidebar_tags() {
            echo '</div>';
        }
    }


    /* HTML tags on shop page */
    add_action('woocommerce_before_main_content', 'lightspeed_add_shop_tags', 9);
    function lightspeed_add_shop_tags() {
        if(is_shop()) {
            echo '<div class="col-lg-9 col-md-8 order-1 order-md-2">';
        }
    }

    add_action('woocommerce_after_main_content', 'lightspeed_close_shop_tags', 4);
    function lightspeed_close_shop_tags() {
        if(is_shop()) {
            echo '</div>';
        }
    }

    /* Add 'see more' button to products */
    add_action('woocommerce_shop_loop_item_title', 'lightspeed_open_see_more_tag');
    function lightspeed_open_see_more_tag() {
        echo '<div class="price-div">';
    }

    add_action('woocommerce_after_shop_loop_item_title', 'lightspeed_close_see_more_tag');
    function lightspeed_close_see_more_tag() {
        echo '<span class="see-more-span">see more</span></div>';
    }

}

add_action('wp', 'lightspeed_wc_modify');
