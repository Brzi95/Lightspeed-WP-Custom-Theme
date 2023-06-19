<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
$product_id = $product->get_id();
$product_title = $product->get_title();
$product_price = $product->get_price();
$product_image = $product->get_image();
$product_attributes = $product->get_attributes();


// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<div class="main-parent" data-product_id="<?php echo $product_id; ?>" data-product_title="<?php echo $product_title; ?>" data-product_price="<?php echo $product_price; ?>">

	<div class='quick-view-product-popup'>
		<div class="popup-container">
			<span>ID: <?php echo $product_id ?> </span>
			<span>TITLE: <?php echo $product_title ?> </span>
			<span>PRICE: <?php echo $product_price ?> </span>
			<a href="?add-to-cart=<?php echo $product_id ?>" >
				<button>ADD TO CART: <?php echo $product_price ?> $ </button>
			</a>
			<div><?php echo $product_image ?></div>

			<?php
			if ($product->is_type('variable')) :
				foreach ($product_attributes as $attribute) {
					$attribute_name = $attribute->get_name();
					$search_for = 'pa_';
					$attribute_name_trimmed = str_replace($search_for, '', $attribute_name);
					?>

					<div class="attribute-<?php echo $attribute_name_trimmed ?>">
						<label><?php echo ucfirst($attribute_name_trimmed); ?></label>
						<select>
							<option value="">Choose an option</option>

					<?php
				
					$attribute_options_ids = $attribute->get_options();
					if (!empty($attribute_options_ids || $attribute_options_ids !== '')) {
						foreach ($attribute_options_ids as $attribute_option_id) {
							$term = get_term($attribute_option_id, $attribute_name);
							if ($term) {
								echo '<option value="' . $term->name . '">' . $term->name . '</option>';
							}
						}
					}

					?>
						</select>
					</div>
	
			<?php
				}
			endif;
			?>



			<button class="close-popup-btn">X</button>
		</div>
	</div>
	
	<li <?php wc_product_class( '', $product ); ?>>

		<?php
		/**
		 * Hook: woocommerce_before_shop_loop_item.
		 *
		 * @hooked woocommerce_template_loop_product_link_open - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item' );

		/**
		 * Hook: woocommerce_before_shop_loop_item_title.
		 *
		 * @hooked woocommerce_show_product_loop_sale_flash - 10
		 * @hooked woocommerce_template_loop_product_thumbnail - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item_title' );

		/**
		 * Hook: woocommerce_shop_loop_item_title.
		 *
		 * @hooked woocommerce_template_loop_product_title - 10
		 */
		do_action( 'woocommerce_shop_loop_item_title' );

		/**
		 * Hook: woocommerce_after_shop_loop_item_title.
		 *
		 * @hooked woocommerce_template_loop_rating - 5
		 * @hooked woocommerce_template_loop_price - 10
		 */
		do_action( 'woocommerce_after_shop_loop_item_title' );

		/**
		 * Hook: woocommerce_after_shop_loop_item.
		 *
		 * @hooked woocommerce_template_loop_product_link_close - 5
		 * @hooked woocommerce_template_loop_add_to_cart - 10
		 */
		do_action( 'woocommerce_after_shop_loop_item' );
		?>
	</li>
</div>
