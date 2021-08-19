<?php

add_action('wp_ajax_catalogfilter', 'alex_catalogfilter_function'); // wp_ajax_{ACTION HERE} 
add_action('wp_ajax_nopriv_catalogfilter', 'alex_catalogfilter_function'); // wp_ajax_nopriv_{ACTION HERE} 
 
function alex_catalogfilter_function(){
	$current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array(
		'posts_per_page' 	=> 3, // Выводит 18 товаров на страницу
		'paged'				=> $current_page,
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

	// СТАРТ ОБЩИЕ ПАРАМЕТРЫ
	// Сортировка по дата (Вначеле - новые) +++++++++++++++
	if( isset( $_POST['catalogfilter'] ) && $_POST['catalogfilter'] == 'date_desc' ){
		foreach ($args as $value => $key) {
			if ($value == 'orderby') { $args[$value] = 'date'; };
			if ($value == 'order') { $args[$value] = 'DESC'; };
		}
	}
	// Сортировка по дата (Вначеле - старые)

	// Сортировка по Популярности (Товары с наибольшими продажами в этой категории)++++++++++++++++
	if( isset( $_POST['catalogfilter'] ) && $_POST['catalogfilter'] == 'popular' ) {
		$args += ['meta_key'=>'total_sales'];
		$args['meta_query'][] = array(
			'key' 		=> 'total_sales',
			'value' 		=> 0,
			'compare' 	=> '>=',
			'type'		=> 'NUMERIC'
		);
		foreach ($args as $value => $key) {
			if ($value == 'orderby') { $args[$value] = 'meta_value_num'; };
			if ($value == 'order') { $args[$value] = 'DESC'; };
		}
	}
	// Сортировка по Цене ( 0 - 9 )+++++++++++++++
	if( isset( $_POST['catalogfilter'] ) && $_POST['catalogfilter'] == 'price_desc' ) {
		$args += ['meta_key'=>'_price'];
		$args['meta_query'][] = array(
			'key' 		=> '_price',
			'value' 		=> 0,
			'compare' 	=> '>',
			'type'		=> 'NUMERIC'
		);
		foreach ($args as $value => $key) {
			if ($value == 'orderby') { $args[$value] = 'meta_value_num'; };
			if ($value == 'order') { $args[$value] = 'ASC'; };
		}
	}
	// Сортировка по Цене ( 9 - 0 )++++++++++++++++
	if( isset( $_POST['catalogfilter'] ) && $_POST['catalogfilter'] == 'price_asc' ) {
		$args += ['meta_key'=>'_price'];
		$args['meta_query'][] = array(
			'key' 		=> '_price',
			'value' 		=> 0,
			'compare' 	=> '>',
			'type'		=> 'NUMERIC'
		);
		foreach ($args as $value => $key) {
			if ($value == 'orderby') { $args[$value] = 'meta_value_num'; };
			if ($value == 'order') { $args[$value] = 'DESC'; };
		}
	}
	// ЦОНЕЦ ОБЩИЕ ПАРАМЕТРЫ

	// СТАРТ ОБЩИЙ ПАРАМЕТР
	// Старт Сортировка по цене
	// создать массив $args['meta_query'], если одно из следующих полей заполнено
	//if( isset( $_POST['price_min'] ) && $_POST['price_min'] || isset( $_POST['price_max'] ) && $_POST['price_max'] )
		//$args['meta_query'][] = array( 'relation'=>'AND' ); // AND означает, что все условия meta_query должны выполняться
 
	// если указаны и минимальная цена, и максимальная цена, мы будем использовать сравнение between
	if( isset( $_POST['price_min'] ) && $_POST['price_min'] && isset( $_POST['price_max'] ) && $_POST['price_max'] ) {
		$args['meta_query'][] = array(
			'key' => '_price',
			'value' => array( $_POST['price_min'], $_POST['price_max'] ),
			'type' => 'numeric',
			'compare' => 'between'
		);
	} else {
		// если установлена ​​только минимальная цена
		if( isset( $_POST['price_min'] ) && $_POST['price_min'] )
			$args['meta_query'][] = array(
				'key' => '_price',
				'value' => $_POST['price_min'],
				'type' => 'numeric',
				'compare' => '>'
			);
		// если установлена ​​только максимальная цена
		if( isset( $_POST['price_max'] ) && $_POST['price_max'] )
			$args['meta_query'][] = array(
				'key' => '_price',
				'value' => $_POST['price_max'],
				'type' => 'numeric',
				'compare' => '<'
			);
	}
	// Конец Сортировка по цене
	
	// Старт Сортировка Категорий
	if( isset( $_POST['category'] ) ) {
		$args['tax_query'] = array( 'relation'=>'AND' ); // AND означает, что все условия tax_query должны выполняться
		$args['tax_query'][] = array(
			'taxonomy' => 'product_cat',
			'field' => 'slug',
			'terms' => $_POST['category']
		);
	} else {
		$args += ['post_type' => 'product'];
	}
	// Конец Сортировка Категорий

	// Старт Сортировка Бренд (ACF - select)
	if( isset( $_POST['brend'] ) )
		$args['meta_query'][] = array(
			'key' => 'brend',
			'value' => $_POST['brend'],
			'compare' => 'IN'
		);
	// Конец Сортировка Бренд (ACF - select)
	
	// Сортировка Наша рекомендация
	if( isset( $_POST['saleproduct'] ) && $_POST['saleproduct'] == 'saleproduct' ) {
		$args['meta_query'][] = array(
			'relation' => 'OR',
			array(
				'key'       => '_sale_price',
				'value'     => 0,
				'compare'   => '>',
				'type'      => 'numeric'
			),
			array(
				'key'       => '_min_variation_sale_price',
				'value'     => 0,
				'compare'   => '>',
				'type'      => 'numeric'
			)
		);
	}

	// Проверить, что форма отправляет через ajax
	echo '<div style="color:#fff;font-size:13px;line-height:15px;width: 100%; display:flex;"><pre style="border:1px solid red;padding:20px;background-color:#000;margin:10px;">';
	print_r($_POST);
	echo '</pre>';
	// Проверить, по каким параметрам будут выводиться товары
	echo '<pre style="border:1px solid red;padding:20px;background-color: #000;margin:10px;">';
	print_r($args);
	echo '</pre></div>';

	// Старт Вывод отсортированных продуктов
	query_posts( $args );
	if( have_posts() ) :
		while( have_posts() ): the_post();
			wc_get_template_part( 'content', 'product' );
		endwhile;
	endif;
	wp_reset_query();

	$wp_query = new WP_Query( $args );
	if (  $wp_query->max_num_pages > 1 ) : ?>
		
		<script>
			var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
			var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
			var max_pages = <?php echo $wp_query->max_num_pages; ?>;
			var foundPosts = <?php echo $wp_query->found_posts; ?>;
		</script>

		<div class="btn" id="catalog_loadmore">
			<button class="show_more btn_click">
				<span class="btn_text">Показать еще</span>
			</button>
		</div>

		<script>
			jQuery(function () {
				$('#catalog_loadmore').on('click', function () {
					$('#catalog_loadmore .show_more').text('Загружаю...'); // изменяем текст кнопки, вы также можете добавить прелоадер
					var data = {
						'action': 'catalogloadmore',
						'query': true_posts,
						'page': current_page
					};
					
					let productLength = $('#response').find('li.product').length;
					let numberSpan = $('.number-span').text();
					let prLength = foundPosts - productLength;
					$.ajax({
						url: url, // обработчик
						data: data, // данные
						type: 'POST', // тип запроса
						success: function (data) {
							if (data) {
								$('#catalog_loadmore').html('<button class="show_more btn_click"><span class="btn_text">Показать еще</span></button>').before(data); // вставляем новые посты
								current_page++; // увеличиваем номер страницы на единицу
								// let math = Math.floor(data.length / 2936);
								
								// let numberSpan = $('.number-span').text();
								
								if (current_page == max_pages) $("#catalog_loadmore").remove(); // если последняя страница, удаляем кнопку
							} else {
								$('#catalog_loadmore').remove(); // если мы дошли до последней страницы постов, скроем кнопку
							}
							
							if( prLength < 3 ) {
								$('.number-span').text(parseInt(numberSpan) + prLength);
							} else {
								$('.number-span').text(parseInt(numberSpan) + 3);
							}
						}
					});
				});
			});
		</script>

	<?php endif;	
	// Конец Вывод отсортированных продуктов
	die();
}