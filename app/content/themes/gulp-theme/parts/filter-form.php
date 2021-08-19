<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="catalogfilter">

	<!-- Вывожу данные текущей категории (id и slug), понадобится в элементах фильтра -->
	<?php
		$category = get_queried_object();
		$current_cat_id = $category->term_id;
		$current_cat_slug = $category->slug;
	?>

	<!-- Старт Выбор категорий - checkbox -->
	<div class="filter-box">
		<div class="title-filter line">Категории</div>
		<ul class="filter-ul">
			<li class="filter-li">
				<label>
					<input class="input-submit" type="radio" name="category" value="mototehnika" />
					<span>Мототехника</span>
				</label>
			</li>
			<li class="filter-li">
				<label>
					<input class="input-submit" type="radio" name="category" value="snaryazhenie" />
					<span>Снаряжение</span>
				</label>
			</li>
			<li class="filter-li">
				<label>
					<input class="input-submit" type="radio" name="category" value="zapchasti" />
					<span>Запчасти</span>
				</label>
			</li>
			<li class="filter-li">
				<label>
					<input class="input-submit" type="radio" name="category" value="masla" />
					<span>Масла</span>
				</label>
			</li>
		</ul>
	</div>
	<!-- Конец Выбор категорий - checkbox -->

	<div class="filter-box clear-box line">
		<span class="title-clear">Фильтр</span>
		<button class="clear-btn input-submit">Очистить</button>
	</div>

	<!-- Старт Ползунок выбора цен -->
	<div class="filter-box">
		<div class="title-filter">Цена (руб.)</div>
		<div class="price-box">
			<input class="price-min input-submit" value="0">
			<input class="price-max input-submit" value="150000">
		</div>
		<div class="range-slider">
			<input type="range" name="price_min"  class="input-submit" id="input-left" min="30" max="1500000" value="30" />
			<input type="range" name="price_max"  class="input-submit" id="input-right" min="30" max="1500000" value="1500000" />
			<div class="slider">
				<div class="track"></div>
				<div class="range"></div>
				<div class="thumb left"></div>
				<div class="thumb right"></div>
			</div>
		</div>
	</div>
	<!-- Конец Ползунок выбора цен -->

	<!-- Старт Выбор Бренда - checkbox (ACF - select)  -->
	<?php
		// Вывожу товары из текущей категории
		$args = array('product_cat' => $current_cat_slug, 'post_type' => 'product', 'posts_per_page' => -1);
		$loop = new WP_Query( $args );
		$newArray = array();
		while ( $loop->have_posts() ) : $loop->the_post();  
			// Получаю значение чекбакса объём (мл) из каждого товара
			$field = get_field('brend', get_the_ID());
			$obyom_ml = $field;
			// Проверка. Вывожу товар только с пометкой "В наличии" и заношу их в массив $newArray
			if (!(get_post_meta(get_the_ID(), '_stock_status', true) == 'outofstock')) { $newArray[] = $obyom_ml; } 
		endwhile; 
		wp_reset_postdata();  
		// Убрать дубликаты значений из массива $newArray
		$result = array_unique($newArray);
		// Сортирую массив в порядке возрастания с учетом цифр в названии
		natsort($result);
		if($result) {
		echo '<div class="filter-box">';
			echo '<div class="title-filter">Бренд</div>';
			echo '<ul class="filter-ul">';
			// Вывожу отсортированный массив
			foreach ($result as $key => $val) : 
				if($val) : ?>
					<li class="filter-li">
						<label class="custom-checkbox">
							<input class="input-submit" type="checkbox" name="brend[]" value="<?php echo $val; ?>" />
							<span><?php echo $val; ?></span>
						</label>
					</li>
					<?php 
				endif;
			endforeach; 
			echo '</ul>';
			echo '<div class="click-filter-ul">Показать все</div>';
		echo '</div>';
		}
	?>						
	<!-- Конец Выбор Бренда - checkbox (ACF - select) -->

	<div class="filter-box">
		<div class="title-filter">Товары со скидкой</div>
		<label class="custom-checkbox">
			<input class="input-submit" type="checkbox" name="saleproduct" value="saleproduct" />
			<span>Да</span>
		</label>
	</div>

	<div class="filter-box">
		<div class="title-filter">Спецпредложения</div>
		<label class="custom-checkbox">
			<input class="input-submit" type="checkbox" name="specials" value="specials" />
			<span>Да</span>
		</label>
	</div>

	<div class="form-filter form-absolute">
		<div class="left">
			<span class="title-class">Сортировать по:</span>
			<ul class="select-class">
				<li>
					<span class="radio-salefilter">Новинки</span>
				</li>
				<!-- Новинки -->
				<li class="option-class">
					<label>
						<input class="input-submit" type="radio" name="catalogfilter" checked="checked" value="date_desc" />
						<span>Новинки</span>
					</label>
				</li>
				<!-- Популярные -->
				<li class="option-class">
					<label>
						<input class="input-submit" type="radio" name="catalogfilter" value="popular" />
						<span>Популярные</span>
					</label>
				</li>
				<!-- Цена по убыванию -->
				<li class="option-class">
					<label>
						<input class="input-submit" type="radio" name="catalogfilter" value="price_asc" />
						<span>Цена по убыванию</span>
					</label>
				</li>
				<!-- Цена по возрастанию -->
				<li class="option-class">
					<label>
						<input class="input-submit" type="radio" name="catalogfilter" value="price_desc" />
						<span>Цена по возрастанию</span>
					</label>
				</li>
			</ul>
		</div>
		<div class="right">
			<div class="count-box">Показано 1- <span class="number-span"> 3</span> из <?php echo $wp_query->found_posts; ?> результатов</div>
		</div>
	</div>

	<!-- Кнопка Применить фильтр -->
	<button class="filter-btn">Очистить фильтр</button>
	<!-- Кнопка Применить фильтр -->

	<!-- input value используется в filter.php -->
	<input type="hidden" name="action" value="catalogfilter">
	
</form>