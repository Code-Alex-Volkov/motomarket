<?php

// load_posts - Показать ещё (start)
function catalog_loadmore_posts(){
	// global $post;
	$args = unserialize( stripslashes( $_POST['query'] ) );
	$current_page = max( 1, $_POST['page'] );
	$per_page = 3;
	$offset_start = 3;
	$offset = ( $current_page - 1 ) * $per_page + $offset_start;
	// $offset = ( $current_page - 1 ) * $per_page;
	$args['offset'] = $offset;
	$args['paged'] = $current_page;
	$args['posts_per_page'] = $per_page;

	// $args['posts_per_page'] = 6;
	// $args['paged'] = $_POST['page'] + 1; // следующая страница
	// $args['post_status'] = 'publish';

	// echo '<pre style="color:#fff;border:1px solid red;padding:20px;background-color: #000;margin:10px;">';
	// print_r($args);
	// echo '</pre>';

	query_posts( $args );

	if( have_posts() ) :

		// запускаем цикл
		while( have_posts() ): the_post();

		wc_get_template_part( 'content', 'product' );

		endwhile;

	endif;
	wp_reset_query();
	die();
}
add_action('wp_ajax_catalogloadmore', 'catalog_loadmore_posts');
add_action('wp_ajax_nopriv_catalogloadmore', 'catalog_loadmore_posts');
// load_posts - Показать ещё (start) 