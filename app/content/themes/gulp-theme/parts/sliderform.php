<?php

add_action('wp_ajax_slidertabs', 'alex_slidertabs_function'); // wp_ajax_{ACTION HERE} 
add_action('wp_ajax_nopriv_slidertabs', 'alex_slidertabs_function'); // wp_ajax_nopriv_{ACTION HERE} 
 
function alex_slidertabs_function(){
	$args = array(
		'post_type'     	=> 'product',
		'posts_per_page' 	=> 3, // Выводит 3 товаров на страницу
		'orderby' 			=> 'date', // Сортировка товаров по дате
		'order'	 			=> 'DESC', // ASC or DESC
		'meta_query' => [ 
		    'relation'=>'AND',
		    [
    			'key' => '_stock_status',
    			'value' => 'instock',
    		] 
		],
	);
	
	if( isset( $_POST['equipment'] ) )
		$args['tax_query'] = array( 'relation'=>'AND' ); // AND означает, что все условия tax_query должны выполняться
		$args['tax_query'][] = array(
			'taxonomy' => 'product_cat',
			'field' => 'slug',
			'terms' => $_POST['equipment']
		);

	// Старт Вывод отсортированных продуктов
	query_posts( $args );
	if( have_posts() ) :
		while( have_posts() ): the_post();
			wc_get_template_part( 'content', 'product' );
		endwhile;
	endif;
	wp_reset_query();
?>
<script>
	jQuery(function () {
		$('.product-type-simple .add_to_cart_button').on("click", function () {
			$(this).parents('.product').find('.count-ok').fadeIn(700, function() {
				$(this).parents('.product').find('.count-ok').fadeOut();
			});
		});
	});
</script>
<?php
	die();
}