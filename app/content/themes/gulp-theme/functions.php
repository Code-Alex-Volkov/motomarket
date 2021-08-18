<?php

// Рaбота с AJAX
require get_template_directory() . '/parts/sliderform.php';
// Рaбота с AJAX
require get_template_directory() . '/parts/filter.php';
require get_template_directory() . '/parts/catalog-filter.php';
// Рaбота с AJAX
require get_template_directory() . '/parts/load-product.php';
require get_template_directory() . '/parts/catalog-loadmore.php';


add_filter('show_admin_bar', '__return_false'); // отключить верхнюю панель администратора

// Register Style And Scripts
function gulp_scripts() {
  wp_enqueue_style( 'gulp-style', get_stylesheet_uri(), '1.1', true );
  wp_enqueue_style( 'gulp-main', get_template_directory_uri() . '/assets/main.min.css', '1.1', true );

	wp_deregister_script( 'jquery' );
  wp_register_script( 'jquery', get_template_directory_uri() . '/assets/jquery.min.js', false, null, true );
  wp_enqueue_script( 'jquery' );

  wp_enqueue_script( 'gulp-script', get_template_directory_uri() . '/assets/main.min.js', array(), '1.1', true );
  // $flexslider = plugins_url('woocommerce/assets/js/flexslider/jquery.flexslider.min.js');
  // wp_enqueue_script( 'flexslider-script', $flexslider, array(), '1.1', true );
}
// Добавить скрипты и стили на сайт
add_action( 'wp_enqueue_scripts', 'gulp_scripts' );

// add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

function remove_styles () {
	wp_deregister_style ('contact-form-7');
	wp_deregister_style ('wc-block-vendors-style');
	wp_deregister_style ('wc-block-style');
	wp_deregister_style ('wp-block-library');
	wp_deregister_style ('woocommerce-layout');
	wp_deregister_style ('woocommerce-smallscreen');
	wp_deregister_style ('woocommerce-general');
}
add_action ('wp_print_styles','remove_styles',100);

/* Options Page */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
	  'page_title' => 'Настройка сайта',
	  'menu_title' => 'Настройка сайта',
	  'menu_slug' => 'theme-general-settings',
	  'capability' => 'edit_posts',
	  'update_button' => __('Обновить', 'acf'),
	  'redirect' => false
	));
}

/* Удаление type="text/javascript" */
add_action( 'template_redirect', function(){
	ob_start( function( $buffer ){
		 $buffer = str_replace( array( 'type="text/javascript"', "type='text/javascript'" ), '', $buffer ); 
		 $buffer = str_replace( array( 'type="text/css"', "type='text/css'" ), '', $buffer );
		 return $buffer;
	});
});
// Start Remove Meta Generators
remove_action('wp_head', 'wp_generator');
// End Remove Meta Generators
// Start delete emoji
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
// End delete emoji

// WOOVOMMERCE SETTINGS

// Сделать тему совместимой с WooCommerce
function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

// Ссылка на товар включает только картинку
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 15 );

// Изменяет символ валюты на буквы "руб."
add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);
function change_existing_currency_symbol( $currency_symbol, $currency ) {
  switch( $currency ) {
      case 'RUB': $currency_symbol = 'руб.'; break;
  }
  return $currency_symbol;
}

// Иконка вместо слова "В карзину"
add_filter( 'woocommerce_product_single_add_to_cart_text', 'tb_woo_custom_cart_button_text' );
add_filter( 'woocommerce_product_add_to_cart_text', 'tb_woo_custom_cart_button_text' );   
function tb_woo_custom_cart_button_text() {
	echo '<div class="link-add-to-cart">';
	echo '<svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="shopping-cart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-shopping-cart fa-w-18"><path fill="currentColor" d="M551.991 64H144.28l-8.726-44.608C133.35 8.128 123.478 0 112 0H12C5.373 0 0 5.373 0 12v24c0 6.627 5.373 12 12 12h80.24l69.594 355.701C150.796 415.201 144 430.802 144 448c0 35.346 28.654 64 64 64s64-28.654 64-64a63.681 63.681 0 0 0-8.583-32h145.167a63.681 63.681 0 0 0-8.583 32c0 35.346 28.654 64 64 64 35.346 0 64-28.654 64-64 0-18.136-7.556-34.496-19.676-46.142l1.035-4.757c3.254-14.96-8.142-29.101-23.452-29.101H203.76l-9.39-48h312.405c11.29 0 21.054-7.869 23.452-18.902l45.216-208C578.695 78.139 567.299 64 551.991 64zM208 472c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm256 0c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm23.438-200H184.98l-31.31-160h368.548l-34.78 160z" class=""></path></svg><span class="cart-title"></span>';
  return __( '', 'woocommerce' );
}

// Исменит ярлык скидки на %
add_action( 'woocommerce_sale_flash', 'pancode_echo_sale_percent' );
function pancode_echo_sale_percent( $html ) {
  global $product;

  $regular_max = 0;
  $sale_min    = 0;
  $discount    = 0;
  if ( 'variable' === $product->get_type() ) {
    $prices      = $product->get_variation_prices();
    $regular_max = max( $prices['regular_price'] );
    $sale_min    = min( $prices['sale_price'] );
  } else {
    $regular_max = $product->get_regular_price();
    $sale_min    = $product->get_sale_price();
  }
  if ( ! $regular_max && $product instanceof WC_Product_Bundle ) {
    $bndl_price_data = $product->get_bundle_price_data();
    $regular_max     = max( $bndl_price_data['regular_prices'] );
    $sale_min        = max( $bndl_price_data['prices'] );
  }
  if ( floatval( $regular_max ) ) {
    $discount = round( 100 * ( $regular_max - $sale_min ) / $regular_max );
  }
  return '<span class="onsale">-&nbsp;' . esc_html( $discount ) . '%</span>';
}

// Изменит вид Вариативной цены с "2 000 руб. - 5 000 руб." на "от 2 000 руб."
add_filter('woocommerce_variable_price_html', 'custom_variation_price', 10, 2);
function custom_variation_price( $price, $product ) {
     $price = '';
     $price .= woocommerce_price($product->get_price());
     return '<span>от ' . $price . '</span>';
}

//Рaбота с Instagram
class Instagram{
  const URL_INSTAGRAM_API = 'https://graph.instagram.com/me/';
  private $access_token = 0;
  public $token_params = 0;
  public $count_post = 0;
  public $error = "";
  public $App = "";
  public function __construct($token, $count = 10){
      global $APPLICATION;
      $this->token_params = $token;
      $this->count_post = $count;
      $this->App=$APPLICATION;
  }
  public function checkApiToken(){
      if(!strlen($this->token_params)){
          $this->error="No API token instagram";
      }
      $this->access_token='/?access_token='.$this->token_params;
  }
  public function getFormatResult($method, $fields = ''){
      if(function_exists('curl_init'))
      {
          if($fields) {
              $method.$this->access_token .= '&fields='.$fields;
          }
          $curl = curl_init();
          curl_setopt($curl, CURLOPT_URL, self::URL_INSTAGRAM_API.$method.$this->access_token."&limit=".$this->count_post);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
          $out = curl_exec($curl);
          $data =  $out ? $out : curl_error($curl);            
      }
      else
      {
          $data = file_get_contents(self::URL_INSTAGRAM_API.$method.$this->access_token);            
      }
      
      $data = json_decode($data, true);
      return $data;
  }
  public function getInstagramPosts(){
      $this->checkApiToken();
      if($this->error){
          return array("ERROR" => "Y", "MESSAGE" => $this->error);
      }else{
          $data=$this->getFormatResult('media', 'id,caption,media_url,permalink,username,timestamp,thumbnail_url');
      }
      return $data;
  }
  
  public function getInstagramUser(){
      $this->checkApiToken();
      if($this->error){
          return $this->error;
      }else{
          $data=$this->getFormatResult('users/self');
      }
      return $data;
  }
  public function getInstagramTag($tag) {
      $this->checkApiToken();
      if($this->error){
          return $this->error;
      }else{
          $data=$this->getFormatResult('tag/'.$tag.'/media/recent');
      }
      return $data;
  }
}

// Добавление товара в корзину, без перезагрузки страницы
// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
// add_action( 'woocommerce_single_product_summary', 'woocommerce_template_loop_add_to_cart', 30 );

// Страница товара
// Удалить хлебные крошки
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
// Удалить сайдбар
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
// Удалить скидку 
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
add_action( 'woocommerce_single_product_summary_alex_add_to_cart', 'woocommerce_template_single_add_to_cart', 30 );


remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );

add_action( 'woocommerce_single_product_summary_alex_info', 'woocommerce_template_single_meta', 7 );
add_action( 'woocommerce_single_product_summary_alex_info', 'woocommerce_template_single_title', 5 );

// Добавить скидку
add_action( 'woocommerce_single_product_summary_alex', 'woocommerce_show_product_sale_flash', 15 );
add_action( 'woocommerce_single_product_summary_alex', 'woocommerce_template_single_price', 10 );

add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {
  unset($fields['billing']['billing_country']);  //удаляем! тут хранится значение страны оплаты
  unset($fields['shipping']['shipping_country']); ////удаляем! тут хранится значение страны доставки

  // unset($fields['order']['order_comments']);
  // unset($fields['billing']['billing_company']);
  // unset($fields['billing']['billing_address_1']);
  // unset($fields['billing']['billing_address_2']);
  // unset($fields['billing']['billing_city']);
  // unset($fields['billing']['billing_postcode']);
  // unset($fields['billing']['billing_country']);
  // unset($fields['billing']['billing_state']);
  // unset($fields['billing']['billing_phone']);

 
  return $fields;
}
// Удалить купон со страницы Оформить заказ
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );

function disable_shipping_calc_on_cart( $show_shipping ) {
  if( is_cart() ) {
      return false;
  }
  return $show_shipping;
}
add_filter( 'woocommerce_cart_ready_to_calc_shipping', 'disable_shipping_calc_on_cart', 99 );

// Удалить товары на странице товара
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

//Сортировка корзины по алфавиту
add_action( 'woocommerce_cart_loaded_from_session', 'truemisha_sort_cart_alphabetically', 25 );
function truemisha_sort_cart_alphabetically() {
	$products_to_sort = array();
	$cart_contents = array();
	foreach ( WC()->cart->get_cart_contents() as $key => $item ) {
		$products_to_sort[ $key ] = $item['data']->get_title();
	}
	natsort( $products_to_sort );
	foreach( $products_to_sort as $cart_key => $product_title ) {
		$cart_contents[ $cart_key ] = WC()->cart->cart_contents[ $cart_key ];
	}
	WC()->cart->cart_contents = $cart_contents;
}

add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {
  $tabs['additional_information']['title'] = __( 'Характеристики' );
  $tabs['additional_information']['priority'] = 50;
  return $tabs;
}

// Создаю ранее просмотренные товары
add_action( 'template_redirect', 'truemisha_recently_viewed_product_cookie', 20 );
function truemisha_recently_viewed_product_cookie() {
	// если находимся не на странице товара, ничего не делаем
	if ( ! is_product() ) {
		return;
	}
	if ( empty( $_COOKIE[ 'woocommerce_recently_viewed_2' ] ) ) {
		$viewed_products = array();
	} else {
		$viewed_products = (array) explode( '|', $_COOKIE[ 'woocommerce_recently_viewed_2' ] );
	}
	// добавляем в массив текущий товар
	if ( ! in_array( get_the_ID(), $viewed_products ) ) {
		$viewed_products[] = get_the_ID();
	}
	// нет смысла хранить там бесконечное количество товаров
	if ( sizeof( $viewed_products ) > 3 ) {
		array_shift( $viewed_products ); // выкидываем первый элемент
	}
 	// устанавливаем в куки
	wc_setcookie( 'woocommerce_recently_viewed_2', join( '|', $viewed_products ) );
}

add_shortcode( 'recently_viewed_products', 'truemisha_recently_viewed_products' );
function truemisha_recently_viewed_products() {
	if( empty( $_COOKIE[ 'woocommerce_recently_viewed_2' ] ) ) {
		$viewed_products = array();
	} else {
		$viewed_products = (array) explode( '|', $_COOKIE[ 'woocommerce_recently_viewed_2' ] );
	}
	if ( empty( $viewed_products ) ) {
		return;
	}
	// надо ведь сначала отображать последние просмотренные
	$viewed_products = array_reverse( array_map( 'absint', $viewed_products ) );
	$title = '<h3 class="title-recently">Вы смотрели ранее</h3>';
	$product_ids = join( ",", $viewed_products );
	return $title . do_shortcode( "[products ids='$product_ids' columns='3']" );
}

// удалить на странице архива селект и количество выводимого товара
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
// Удалить на странице архива пагинацию
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );

remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10 );


add_filter( 'woocommerce_single_product_carousel_options', 'truemisha_product_gallery_arrows' );
 
function truemisha_product_gallery_arrows( $options ) {
 
	$options[ 'directionNav' ] = true;
	$options[ 'nextText' ] = '<buttom class="slick-next"><span class="arr"></span></buttom>';
	$options[ 'prevText' ] = '<buttom class="slick-prev"><span class="arr"></span></buttom>';
	$options[ 'maxItems' ] = 4;
	return $options;
 
}

// Добавление чекбокса
add_action( 'woocommerce_review_order_before_submit', 'truemisha_privacy_checkbox', 25 );
 
function truemisha_privacy_checkbox() {
 
	woocommerce_form_field( 'privacy_policy_checkbox', array(
		'type'          => 'checkbox',
		'class'         => array( 'form-row' ),
		'label_class'   => array( 'woocommerce-form__label-for-checkbox' ),
		'input_class'   => array( 'woocommerce-form__input-checkbox' ),
		'required'      => true,
		'label'         => '<span class="input-checkbox-text">Я принимаю условия <a href="/politika">политики обработки персональных данных</a></span>',
	));
 
}
 
// Валидация
add_action( 'woocommerce_checkout_process', 'truemisha_privacy_checkbox_error', 25 );
 
function truemisha_privacy_checkbox_error() {
 
	if ( empty( $_POST[ 'privacy_policy_checkbox' ] ) ) {
		wc_add_notice( 'Ваш нужно принять политику конфиденциальности.', 'error' );
	}
 
}