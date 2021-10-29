<?php

// load_posts - Показать ещё (start)
function true_load_posts(){
	// global $post;
	$args = unserialize( stripslashes( $_POST['query'] ) );
	$current_page = max( 1, $_POST['page'] );
	$per_page = 12;
	$offset_start = 12;
	$offset = ( $current_page - 1 ) * $per_page + $offset_start;
	// $offset = ( $current_page - 1 ) * $per_page;
	$args['offset'] = $offset;
	$args['paged'] = $current_page;
	$args['posts_per_page'] = $per_page;

	query_posts( $args );

	if( have_posts() ) :

		// запускаем цикл
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
add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');
// load_posts - Показать ещё (start) 