<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="catalogfilter">

	<!-- Вывожу данные текущей категории (id и slug), понадобится в элементах фильтра -->
	<?php
		$category = get_queried_object();
		$current_cat_id = $category->term_id;
		$current_cat_slug = $category->slug;
		$catPOST = $_POST['category'];
		$subCatPOST = $_POST['subcategory'];
	?>

	<!-- Старт Выбор категорий - checkbox -->
	<div class="filter-box">
		<div class="title-filter line">Категории</div>
		<ul class="filter-ul category-box">
			<li class="filter-li mototehnika-click" >
				<label>
					<input class="input-submit" type="radio" name="category" value="mototehnika" <?php if(!empty($catPOST) && $catPOST == 'mototehnika') { echo 'checked'; } ?> />
					<span>Мототехника</span>
				</label>
			</li>
			<li class="filter-li snaryazhenie-click">
				<label>
					<input class="input-submit" type="radio" name="category" value="snaryazhenie" <?php if(!empty($catPOST) && $catPOST == 'snaryazhenie') { echo 'checked'; } ?> />
					<span>Снаряжение</span>
				</label>
			</li>
			<li class="filter-li zapchasti-click">
				<label>
					<input class="input-submit" type="radio" name="category" value="zapchasti" <?php if(!empty($catPOST) && $catPOST == 'zapchasti') { echo 'checked'; } ?> />
					<span>Запчасти</span>
				</label>
			</li>
			<li class="filter-li masla-click">
				<label>
					<input class="input-submit" type="radio" name="category" value="masla" <?php if(!empty($catPOST) && $catPOST == 'masla') { echo 'checked'; } ?> />
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
			<input type="text" class="price-min input-focusin" name="price_min" value="30">
			<input type="text" class="price-max input-focusin" name="price_max" value="190000">
		</div>
		<div class="range-slider">
			<input type="range" class="input-submit" id="input-left" min="30" max="200000" value="100" />
			<input type="range" class="input-submit" id="input-right" min="30" max="200000" value="190000" />
			<div class="slider">
				<div class="track"></div>
				<div class="range"></div>
				<div class="thumb left"></div>
				<div class="thumb right"></div>
			</div>
		</div>
	</div>
	<!-- Конец Ползунок выбора цен -->

	<!-- Старт Выбор Мототехника - checkbox -->
	<?php
		$term = get_term_by( 'slug', 'mototehnika', 'product_cat');
		$parent_term_id = $term->term_id;
		$sub_cats = get_terms( array(
			'taxonomy' => 'product_cat',
			'child_of' => $parent_term_id,
			'hide_empty' => 0
		) );
		?>
		<div class="filter-box filter-box-cat mototehnika <?php if( !empty($catPOST) && $catPOST == "mototehnika" ) { echo 'active'; } ?>">
			<?php
			echo '<div class="title-filter">Мототехника</div>';
			echo '<ul class="filter-ul">';
			if( $sub_cats ){
				foreach( $sub_cats as $cat ){ ?>
					<li class="filter-li">
						<label class="custom-checkbox">
							<input class="input-submit" type="checkbox" name="subcategory[]" value="<?php echo $cat->slug; ?>" <?php if(!empty($subCatPOST) && $subCatPOST[0] == $cat->slug) { echo 'checked'; } ?> />
							<span><?php echo $cat->name; ?></span>
						</label>
					</li>
				<?php }

				wp_reset_postdata(); // сбрасываем глобальную переменную пост
			}
			echo '</ul>';
		echo '</div>';
	?>						
	<!-- Конец Выбор Мототехника - checkbox -->

	<!-- Старт Выбор Снаряжение - checkbox  -->
	<?php
		$term = get_term_by( 'slug', 'snaryazhenie', 'product_cat');
		$parent_term_id = $term->term_id;
		$sub_cats = get_terms( array(
			'taxonomy' => 'product_cat',
			'child_of' => $parent_term_id,
			'hide_empty' => 0
		) );
		?>
		<div class="filter-box filter-box-cat snaryazhenie <?php if( !empty($catPOST) && $catPOST == "snaryazhenie" ) { echo 'active'; } ?>">
			<?php
			echo '<div class="title-filter">Снаряжение</div>';
			echo '<ul class="filter-ul">';
			if( $sub_cats ){
				foreach( $sub_cats as $cat ){ ?>
					<li class="filter-li">
						<label class="custom-checkbox">
							<input class="input-submit" type="checkbox" name="subcategory[]" value="<?php echo $cat->slug; ?>" <?php if(!empty($subCatPOST) && $subCatPOST[0] == $cat->slug) { echo 'checked'; } ?> />
							<span><?php echo $cat->name; ?></span>
						</label>
					</li>
				<?php }

				wp_reset_postdata(); // сбрасываем глобальную переменную пост
			}
			echo '</ul>';
		echo '</div>';
	?>						
	<!-- Конец Выбор Снаряжение - checkbox -->

	<!-- Старт Выбор Запчасти - checkbox  -->
	<?php
		$term = get_term_by( 'slug', 'zapchasti', 'product_cat');
		$parent_term_id = $term->term_id;
		$sub_cats = get_terms( array(
			'taxonomy' => 'product_cat',
			'child_of' => $parent_term_id,
			'hide_empty' => 0
		) );
		?>
		<div class="filter-box filter-box-cat zapchasti <?php if( !empty($catPOST) && $catPOST == "zapchasti" ) { echo 'active'; } ?>">
			<?php
			echo '<div class="title-filter">Запчасти</div>';
			echo '<ul class="filter-ul">';
			if( $sub_cats ){
				foreach( $sub_cats as $cat ){ ?>
					<li class="filter-li">
						<label class="custom-checkbox">
							<input class="input-submit" type="checkbox" name="subcategory[]" value="<?php echo $cat->slug; ?>" <?php if(!empty($subCatPOST) && $subCatPOST[0] == $cat->slug) { echo 'checked'; } ?> />
							<span><?php echo $cat->name; ?></span>
						</label>
					</li>
				<?php }

				wp_reset_postdata(); // сбрасываем глобальную переменную пост
			}
			echo '</ul>';
		echo '</div>';
	?>						
	<!-- Конец Выбор Запчасти - checkbox -->

	<!-- Старт Выбор Масла - checkbox  -->
	<?php
		$term = get_term_by( 'slug', 'masla', 'product_cat');
		$parent_term_id = $term->term_id;
		$sub_cats = get_terms( array(
			'taxonomy' => 'product_cat',
			'child_of' => $parent_term_id,
			'hide_empty' => 0
		) );
		?>
		<div class="filter-box filter-box-cat masla <?php if( !empty($catPOST) && $catPOST == "masla" ) { echo 'active'; } ?>">
			<?php
			echo '<div class="title-filter">Масла</div>';
			echo '<ul class="filter-ul">';
			if( $sub_cats ){
				foreach( $sub_cats as $cat ){ ?>
					<li class="filter-li">
						<label class="custom-checkbox">
							<input class="input-submit" type="checkbox" name="subcategory[]" value="<?php echo $cat->slug; ?>" <?php if(!empty($subCatPOST) && $subCatPOST[0] == $cat->slug) { echo 'checked'; } ?> />
							<span><?php echo $cat->name; ?></span>
						</label>
					</li>
				<?php }

				wp_reset_postdata(); // сбрасываем глобальную переменную пост
			}
			echo '</ul>';
		echo '</div>';
	?>						
	<!-- Конец Выбор Масла - checkbox -->

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
			<input class="input-submit" type="checkbox" name="specials" />
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
		<!-- <div class="right">
			<div class="count-box">Показано 1- <span class="number-span"> 3</span> из <?php echo $wp_query->found_posts; ?> результатов</div>
		</div> -->
	</div>

	<!-- Кнопка Применить фильтр -->
	<button class="clear-btn filter-btn">Очистить фильтр</button>
	<!-- Кнопка Применить фильтр -->

	<!-- input value используется в filter.php -->
	<input type="hidden" name="action" value="catalogfilter">
	
</form>

<div class="filter-close">
	<span class="top-line"></span>
	<span class="bottom-line"></span>
</div>