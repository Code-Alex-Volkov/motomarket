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

<div class="catalog-content">
	<div class="left-filter">
		<?php get_template_part( './parts/filter-form' ); ?>
	</div>
	<div class="right-content">

		<ul id="response" class="products">
			<?php
				
				$current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array(
					'post_type'     	  	=> 'product',
					'paged'           	=> $current_page,
					'order'           	=> 'DESC',
					'posts_per_page'		=> 3,
					'meta_query' => [ [
						'key' => '_stock_status',
						'value' => 'instock',
					] ],
				);
				
				if($category->name != 'product') {
					$product_cat = $category->slug;
					$args += ['product_cat'=>$product_cat];
				}
				$wp_query = new WP_Query( $args );
				query_posts( $args );
				$wp_query->is_archive = true;
				
				//echo '<pre style="border:1px solid red;padding:20px;background-color: #000;margin:10px;">';
				//print_r($args);
				//echo '</pre>';

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
				</script>

				<div class="btn" id="catalog_loadmore">
					<button class="show_more btn_click">
						<span class="btn_text">Показать еще</span>
					</button>
				</div>
				
			<?php endif; ?>

		</ul>
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