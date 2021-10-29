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
			'relation' => 'AND',
			[
				'relation'=>'AND',
				[
					'key' => '_stock_status',
					'value' => 'instock',
				]
			],
			[
				'relation' => 'OR',
				[
					'key'     => '_price',
					'value'   => '',
					'type'    => 'numeric',
					'compare' => '!='
				],
				[
					'key'     => '_price',
					'value'   => 0,
					'type'    => 'numeric',
					'compare' => '!='
				]
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

	die();
} 
?>