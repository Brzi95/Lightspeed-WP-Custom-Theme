<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_unique_id/
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @package WordPress
 * @subpackage Lightspeed
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <input type="search" calss="search-field" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'lightspeed'); ?>" value="<?php echo get_search_query(); ?>" name="s">
    <button type="submit" class="seacrh-submit">
        <span class="screen-reader-text">
            <?php echo _x('Search', 'submit button', 'lightspeed') ?>
        </span>
    </button>
    <?php if(class_exists('WooCommerce')): ?>
        <!-- search query will list only products -->
        <input type="hidden" value="product" name="post_type" id="post_type">
    <?php endif; ?>
</form>
