<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>



	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

<?php 
		$terms = get_the_terms( $post->ID , 'product_cat' );
		
		$parentID = $terms[key($terms)]->parent;
		$catName = get_the_category_by_ID( $parentID );
		$term = get_term_by( 'name', $catName, 'product_cat');
		$catSlug = $term->slug;
		$subCatName = $terms[key($terms)]->name;
		$subCatSlug = $terms[key($terms)]->slug;
		echo '<pre style="color:#fff;font-size:13px;line-height:15px;border:1px solid red;padding:20px;background-color: #000;margin:10px;">';
		print_r($terms);
	   echo '</pre>'; 		
	?>

	<div class="main-condition">
		<a href="/">Главная</a>&nbsp;-&nbsp;
		<a href="/catalog">Каталог</a>&nbsp;-&nbsp;

		<form action="/catalog" method="POST" class="menu-item">
			<button class="button-form"><?php echo $catName; ?></button>
			<input type="hidden" name="category" value="<?php echo $catSlug; ?>">
		</form>
		&nbsp;-&nbsp;
		<form action="/catalog" method="POST" class="menu-item">
			<button class="button-form"><?php echo $subCatName; ?></button>
			<input type="hidden" name="subcategory[]" value="<?php echo $subCatSlug; ?>">
		</form>

		<span class="text-upper text-upper-mobile"> - <?php the_title(); ?></span>
	</div>
		
	<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>

<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
