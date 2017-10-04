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
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div class="col-lg-4 col-md-5 hidden-sm hidden-xs">
<div class="main-items-wrap_items-place_item">
    <div class="main-items-wrap_items-place_item_img-wrap">
                      <div class="inner-wrap">
	<?php
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_shop_loop_link_open_1' );

	/**
	 * woocommerce_before_shop_loop_item_title hook.
	 *
	 *@hooked woocommerce_template_loop_product_thumbnail - 10 
	 *@hooked woocommerce_show_product_loop_sale_flash - 10 
	 */
                          
    do_action( 'woocommerce_before_shop_loop_item_title' );
	do_action( 'woocommerce_shop_loop_sale_flash_1' );
    do_action( 'woocommerce_ocean_close_link' );
                          ?>
                          </div>
         </div>
    <?php
	/**
	 * woocommerce_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	do_action( 'woocommerce_shop_loop_item_title' );
  ?>   
       <div class="main-items-wrap_items-place_item_price-wrap">  
        <?php
	/**
	 * woocommerce_after_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
           
	do_action( 'woocommerce_after_shop_loop_item_title' );
    ?>
            </div>
    
    <div class="main-items-wrap_items-place_item_buttons-wrap">
    <form class="cart" method="post" enctype='multipart/form-data'>
   <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
 
   <?php if ( ! $product->is_sold_individually() )
     woocommerce_quantity_input( array(
      'min_value' => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
      'max_value' => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product )
     ) );
   ?>
 
   <input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" /> 
  <div class="to-cart-btn-wrap">
      
    <?php do_action( 'woocommerce_after_shop_loop_item' ); ?> 
</div>
  <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?> 
 </form>
  
 <?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
       </div>                   
                    
</div>
</div>