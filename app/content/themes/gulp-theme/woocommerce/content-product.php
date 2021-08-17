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

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class( '', $product ); ?>>

	<?php 
		$b = get_the_time('Y-m-d H:i:s');
		$indt = strtotime($b);
		$currentDate = strtotime(current_datetime()->format('Y-m-d H:i:s'));
		$razDate = $currentDate - $indt;
		$constNew = 24*60*60;
		$dateLabel = (int)(get_field('date-label', 'option'));
		$dateNew = $dateLabel*$constNew;

		$hitLabel = (int)(get_field('hit-label', 'option'));
		$units_sold = get_post_meta( $product->get_id(), 'total_sales', true );
	?>

	<ul class="icon-product-box">
		<?php if($product->is_on_sale()) { ?>
			<li><span class="icon-product icon-product-sale">Скидка</span></li>
		<?php } ?>
		<?php if($razDate <= $dateNew) { ?>
			<li><span class="icon-product icon-product-new">Новинка</span></li>
		<?php } ?>
		<?php if($units_sold >= $hitLabel) { ?>
			<li><span class="icon-product icon-product-hit">Хит</span></li>
		<?php } ?>
	</ul>

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
		 * Hook: woocommerce_after_shop_loop_item_title.
		 *
		 * @hooked woocommerce_template_loop_rating - 5
		 * @hooked woocommerce_template_loop_price - 10
		 */
		do_action( 'woocommerce_after_shop_loop_item_title' );
	?>

	<!-- Название товара - ссылка на товар -->
	<a class="link-title" href="<?php the_permalink(); ?>">
		<?php
			/**
			 * Hook: woocommerce_shop_loop_item_title.
			 *
			 * @hooked woocommerce_template_loop_product_title - 10
			 */
			do_action( 'woocommerce_shop_loop_item_title' );

		?>
	</a>

	<!-- Добавил кнопку "Подробнее" с ссылкой на товар -->
	<a class="more-details" href="<?php the_permalink(); ?>">Подробнее</a>
	<div class="count-ok" style="display: none;">Товар добавлен!</div>
	<?php
		/**
		 * Hook: woocommerce_after_shop_loop_item.
		 *
		 * @hooked woocommerce_template_loop_product_link_close - 5
		 * @hooked woocommerce_template_loop_add_to_cart - 10
		 */
		do_action( 'woocommerce_after_shop_loop_item' );
	?>
	
</li>
