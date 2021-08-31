<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit; ?>

<div class="wrapper">

	<div class="main-condition">
		<a href="/">Главная</a>&nbsp;-&nbsp;
		<span>ЛИЧНЫЙ КАБИНЕТ</span>
	</div>

	<div class="wrapper-account">
		<?php $url = basename(((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>
		<div class="left-box">
			<?php global $woocommerce; ?>
			<a class="basket-btn<?php if($url == 'edit-account') { echo ' active'; } ?>" href="/my-account/edit-account/">
				<img src="<?php echo get_template_directory_uri() ?>/assets/img/icon-account-user.svg" alt="cart">
				<span class="basket-btn-counter">Профиль</span>
			</a>
			<a class="basket-btn<?php if($url == 'orders') { echo ' active'; } ?>" href="/my-account/orders/">
				<img src="<?php echo get_template_directory_uri() ?>/assets/img/icon-account-listorder.svg" alt="cart">
				<span class="basket-btn-counter">Мои заказы</span>
			</a>
			<a class="basket-btn" href="<?php echo esc_url( wc_get_cart_url() );?>">
				<img src="<?php echo get_template_directory_uri() ?>/assets/img/icon-account-cart.svg" alt="cart">
				<span class="basket-btn-counter">
					Корзина
					<?php 
						if($woocommerce->cart->cart_contents_count) { 
							echo '( ' .sprintf($woocommerce->cart->cart_contents_count) . ' )';
						} else { 
							echo '( 0 )';
						}
					?>
				</span>
			</a>
			<a class="basket-btn" href="<?php echo wp_logout_url( home_url() ); ?>">
				<img src="<?php echo get_template_directory_uri() ?>/assets/img/icon-account-logout.svg" alt="cart">
				<span class="basket-btn-counter">Выйти</span>
			</a>
		</div>

		<div class="right-box<?php if($url == 'orders') { echo ' active'; } ?>">
		
			<div class="woocommerce-MyAccount-content">
				<?php
					/**
					 * My Account content.
					 *
					 * @since 2.6.0
					 */
					do_action( 'woocommerce_account_content' );
				?>
			</div>

		</div>

	</div>

</div>


