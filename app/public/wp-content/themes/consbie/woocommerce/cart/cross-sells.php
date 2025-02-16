<?php
/**
 * Cross-sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cross-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 */

defined( 'ABSPATH' ) || exit;

if ( $cross_sells ) : ?>

	<div class="cross-sells">

		<h2><?php esc_html_e( 'You may be interested in&hellip;', 'woocommerce' ); ?></h2>

		<?php woocommerce_product_loop_start(); ?>
        <div class="nxl-products-element row product-archive product-related shop-single-related">
			<?php foreach ( $cross_sells as $cross_sell ) : ?>

				<?php
					$post_object = get_post( $cross_sell->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.OverrideProhibited, Squiz.PHP.DisallowMultipleAssignments.Found

					?> <div class="nxl-products-grid col-xl-3 col-lg-6 col-12 my-20"> <div class="nxl_info_product"><?php
            		wc_get_template_part( 'content', 'product' );
                   ?> </div> </div> 
			

			<?php endforeach; ?>
        </div>
		<?php woocommerce_product_loop_end(); ?>

	</div>
	<?php
endif;

wp_reset_postdata();
