<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
<div class="main-condition"><a href="/">Главная </a><span> - КАТАЛОГ</span></div>

<?php
	$current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array(
		'post_type'     	  	=> 'product',
		'paged'           	=> $current_page,
		'order'           	=> 'DESC',
		'posts_per_page'		=> 3,
		'meta_query' => [ 
			[
				'key' 		=> '_stock_status',
				'value' 		=> 'instock',
			]
		],
	);

	if(!empty($_POST['category'])) {
		$product_cat = $_POST['category'];
		$args['tax_query'][] = array(
			'taxonomy' => 'product_cat',
			'field' => 'slug',
			'terms' => $product_cat,
			'include_children' => true
		);
  }
	
	$wp_query = new WP_Query( $args );
?>

<div class="catalog-content">
	<div class="left-filter">
		<?php get_template_part( './parts/filter-form' ); ?>
	</div>
	<div class="right-content">
		<div class="title-page">КАТАЛОГ</div>	
		
		<div class="content-archive">
			<div id="filter-loader" style="display:none;"><span class="load-svg"><svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="cog" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-cog fa-w-16"><path fill="currentColor" d="M482.696 299.276l-32.61-18.827a195.168 195.168 0 0 0 0-48.899l32.61-18.827c9.576-5.528 14.195-16.902 11.046-27.501-11.214-37.749-31.175-71.728-57.535-99.595-7.634-8.07-19.817-9.836-29.437-4.282l-32.562 18.798a194.125 194.125 0 0 0-42.339-24.48V38.049c0-11.13-7.652-20.804-18.484-23.367-37.644-8.909-77.118-8.91-114.77 0-10.831 2.563-18.484 12.236-18.484 23.367v37.614a194.101 194.101 0 0 0-42.339 24.48L105.23 81.345c-9.621-5.554-21.804-3.788-29.437 4.282-26.36 27.867-46.321 61.847-57.535 99.595-3.149 10.599 1.47 21.972 11.046 27.501l32.61 18.827a195.168 195.168 0 0 0 0 48.899l-32.61 18.827c-9.576 5.528-14.195 16.902-11.046 27.501 11.214 37.748 31.175 71.728 57.535 99.595 7.634 8.07 19.817 9.836 29.437 4.283l32.562-18.798a194.08 194.08 0 0 0 42.339 24.479v37.614c0 11.13 7.652 20.804 18.484 23.367 37.645 8.909 77.118 8.91 114.77 0 10.831-2.563 18.484-12.236 18.484-23.367v-37.614a194.138 194.138 0 0 0 42.339-24.479l32.562 18.798c9.62 5.554 21.803 3.788 29.437-4.283 26.36-27.867 46.321-61.847 57.535-99.595 3.149-10.599-1.47-21.972-11.046-27.501zm-65.479 100.461l-46.309-26.74c-26.988 23.071-36.559 28.876-71.039 41.059v53.479a217.145 217.145 0 0 1-87.738 0v-53.479c-33.621-11.879-43.355-17.395-71.039-41.059l-46.309 26.74c-19.71-22.09-34.689-47.989-43.929-75.958l46.329-26.74c-6.535-35.417-6.538-46.644 0-82.079l-46.329-26.74c9.24-27.969 24.22-53.869 43.929-75.969l46.309 26.76c27.377-23.434 37.063-29.065 71.039-41.069V44.464a216.79 216.79 0 0 1 87.738 0v53.479c33.978 12.005 43.665 17.637 71.039 41.069l46.309-26.76c19.709 22.099 34.689 47.999 43.929 75.969l-46.329 26.74c6.536 35.426 6.538 46.644 0 82.079l46.329 26.74c-9.24 27.968-24.219 53.868-43.929 75.957zM256 160c-52.935 0-96 43.065-96 96s43.065 96 96 96 96-43.065 96-96-43.065-96-96-96zm0 160c-35.29 0-64-28.71-64-64s28.71-64 64-64 64 28.71 64 64-28.71 64-64 64z" class=""></path></svg></span></div>
			<ul id="response" class="products">
				<?php 
					// // Проверить, что форма отправляет через ajax
					// echo '<div style="color:#fff;font-size:13px;line-height:15px;width: 100%; display:flex;"><pre style="border:1px solid red;padding:20px;background-color:#000;margin:10px;">';
					// print_r($_POST);
					// echo '</pre>';
					// // Проверить, по каким параметрам будут выводиться товары
					// echo '<pre style="border:1px solid red;padding:20px;background-color: #000;margin:10px;">';
					// print_r($args);
					// echo '</pre></div>'; 
				?>
				<div class="right">
					<?php if($wp_query->found_posts == 0) { ?>
						<div class="count-box">Товаров не найдено</div>
					<?php } else { ?>
						<div class="count-box">Показано 1- <span class="number-span"><?php if( $wp_query->found_posts < 3 ) { echo $wp_query->found_posts; } else { echo ' 3'; } ?></span> из <?php echo $wp_query->found_posts; ?> результатов</div>
					<?php } ?>
				</div>
				<?php if($wp_query->found_posts <= 3) { ?>
					<?php
						query_posts( $args );
						$wp_query->is_archive = true;

						if ( have_posts() ) : while ( have_posts() ) : the_post(); 

							wc_get_template_part( 'content', 'product' );
							
						endwhile; endif;
					?>
					<?php wp_reset_query(); ?>
				<?php } else { ?>
					<?php
						query_posts( $args );
						$wp_query->is_archive = true;

						if ( have_posts() ) : while ( have_posts() ) : the_post(); 

							wc_get_template_part( 'content', 'product' );
							
						endwhile; endif;
					?>
					<?php wp_reset_query(); ?>

					<?php if (  $wp_query->max_num_pages > 1 ) : ?>

						<script>
							var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
							var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
							var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
							var url = "<?php echo site_url() . '/wp-admin/admin-ajax.php'; ?>";
							var foundPosts = <?php echo $wp_query->found_posts; ?>;
						</script>

						<div class="btn" id="catalog_loadmore">
							<button class="show_more btn_click">
								<span class="btn_text">Показать еще</span>
							</button>
						</div>

					<?php endif; ?>

				<?php } ?>

				

			</ul>
		</div>
		<?php
			/**
			 * Hook: woocommerce_after_main_content.
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' ); 
		?>
					
	</div>
</div>
	<?php
		/**
		 * Hook: woocommerce_sidebar.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );