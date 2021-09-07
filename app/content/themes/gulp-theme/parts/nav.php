<div class="menu-content menu-content-desctop">
	<div class="item-box item-box-hover">
		<form action="/catalog" method="POST" class="menu-item">
			<button class="button-form">
				<span class="icon"><img src="<?php echo get_template_directory_uri() ?>/assets/img/icon_menu-moto.svg" alt="icon"></span>
				<span class="title">Мототехника</span>
				<span class="right-line"><img src="<?php echo get_template_directory_uri() ?>/assets/img/dirt-02.svg" alt="icon"></span>
			</button>
			<input type="hidden" name="category" value="mototehnika">
		</form>
		<div class="item-sub-menu">

			<form action="/catalog" method="POST" class="menu-item-sub<?php if( $slug1 == 'motoczikly' ){ echo ' nav-active'; } ?>">
				<button class="button-form menu-item-sub">
					<span class="icon"><img src="<?php echo get_template_directory_uri() ?>/assets/img/icon_menu-moto_01.svg" alt="icon"></span>
					<span class="title">Мотоциклы</span>
				</button>
				<input type="hidden" name="category" value="mototehnika">
				<input type="hidden" name="subcategory[]" value="motoczikly">
			</form>

			<form action="/catalog" method="POST" class="menu-item-sub<?php if( $slug1 == 'motoczikly2' ){ echo ' nav-active'; } ?>">
				<button class="button-form menu-item-sub">
					<span class="icon"><img src="<?php echo get_template_directory_uri() ?>/assets/img/icon_menu-moto_02.svg" alt="icon"></span>
					<span class="title">Мопеды и скутеры</span>
				</button>
				<input type="hidden" name="category" value="mototehnika">
				<input type="hidden" name="subcategory[]" value="motoczikly2">
			</form>

			<form action="/catalog" method="POST" class="menu-item-sub<?php if( $slug1 == 'motoczikly3' ){ echo ' nav-active'; } ?>">
				<button class="button-form menu-item-sub">
					<span class="icon"><img src="<?php echo get_template_directory_uri() ?>/assets/img/icon_menu-moto_03.svg" alt="icon"></span>
					<span class="title">Квадроциклы</span>
				</button>
				<input type="hidden" name="category" value="mototehnika">
				<input type="hidden" name="subcategory[]" value="motoczikly3">
			</form>

			<form action="/catalog" method="POST" class="menu-item-sub<?php if( $slug1 == 'motoczikly4' ){ echo ' nav-active'; } ?>">
				<button class="button-form menu-item-sub">
					<span class="icon"><img src="<?php echo get_template_directory_uri() ?>/assets/img/icon_menu-moto_04.svg" alt="icon"></span>
					<span class="title">Снегоходы</span>
				</button>
				<input type="hidden" name="category" value="mototehnika">
				<input type="hidden" name="subcategory[]" value="motoczikly4">
			</form>

			<form action="/catalog" method="POST" class="menu-item-sub<?php if( $slug1 == 'motoczikly5' ){ echo ' nav-active'; } ?>">
				<button class="button-form menu-item-sub">
					<span class="icon"><img src="<?php echo get_template_directory_uri() ?>/assets/img/icon_menu-moto_05.svg" alt="icon"></span>
					<span class="title">Водная техника</span>
				</button>
				<input type="hidden" name="category" value="mototehnika">
				<input type="hidden" name="subcategory[]" value="motoczikly5">
			</form>
			
		</div>
	</div>
	<div class="item-box item-box-hover">
		<form action="/catalog" method="POST" class="menu-item">
			<button class="button-form">
				<span class="icon">
					<img src="<?php echo get_template_directory_uri() ?>/assets/img/icon_menu-helmet.svg" alt="icon">
				</span>
				<span class="title">Снаряжение</span>
				<span class="right-line">
					<img src="<?php echo get_template_directory_uri() ?>/assets/img/dirt-02.svg" alt="icon">
				</span>
			</button>
			<input type="hidden" name="category" value="snaryazhenie">
		</form>
		<div class="item-sub-menu">

			<form action="/catalog" method="POST" class="menu-item-sub menu-item-sub-two<?php if( $slug1 == 'motoshlemy' ){ echo ' nav-active'; } ?>">
				<button class="button-form menu-item-sub menu-item-sub-two">
					<span class="title">Мотошлемы</span>
				</button>
				<input type="hidden" name="category" value="snaryazhenie">
				<input type="hidden" name="subcategory[]" value="motoshlemy">
			</form>

			<form action="/catalog" method="POST" class="menu-item-sub menu-item-sub-two<?php if( $slug1 == 'snaryazhenie-aksessuary' ){ echo ' nav-active'; } ?>">
				<button class="button-form menu-item-sub menu-item-sub-two">
					<span class="title">Аксессуары</span>
				</button>
				<input type="hidden" name="category" value="snaryazhenie">
				<input type="hidden" name="subcategory[]" value="snaryazhenie-aksessuary">
			</form>

			<form action="/catalog" method="POST" class="menu-item-sub menu-item-sub-two<?php if( $slug1 == 'ochki' ){ echo ' nav-active'; } ?>">
				<button class="button-form menu-item-sub menu-item-sub-two">
					<span class="title">Очки</span>
				</button>
				<input type="hidden" name="category" value="snaryazhenie">
				<input type="hidden" name="subcategory[]" value="ochki">
			</form>

			<form action="/catalog" method="POST" class="menu-item-sub menu-item-sub-two<?php if( $slug1 == 'zashhitnaya-amunicziya' ){ echo ' nav-active'; } ?>">
				<button class="button-form menu-item-sub menu-item-sub-two">
					<span class="title">Защитная амуниция</span>
				</button>
				<input type="hidden" name="category" value="snaryazhenie">
				<input type="hidden" name="subcategory[]" value="zashhitnaya-amunicziya">
			</form>

			<form action="/catalog" method="POST" class="menu-item-sub menu-item-sub-two<?php if( $slug1 == 'dzhersi' ){ echo ' nav-active'; } ?>">
				<button class="button-form menu-item-sub menu-item-sub-two">
					<span class="title">Джерси</span>
				</button>
				<input type="hidden" name="category" value="snaryazhenie">
				<input type="hidden" name="subcategory[]" value="dzhersi">
			</form>

			<form action="/catalog" method="POST" class="menu-item-sub menu-item-sub-two<?php if( $slug1 == 'motoboty' ){ echo ' nav-active'; } ?>">
				<button class="button-form menu-item-sub menu-item-sub-two">
					<span class="title">Мотоботы</span>
				</button>
				<input type="hidden" name="category" value="snaryazhenie">
				<input type="hidden" name="subcategory[]" value="motoboty">
			</form>

			<form action="/catalog" method="POST" class="menu-item-sub menu-item-sub-two<?php if( $slug1 == 'perchatki' ){ echo ' nav-active'; } ?>">
				<button class="button-form menu-item-sub menu-item-sub-two">
					<span class="title">Перчатки</span>
				</button>
				<input type="hidden" name="category" value="snaryazhenie">
				<input type="hidden" name="subcategory[]" value="perchatki">
			</form>

		</div>
	</div>
	<div class="item-box item-box-hover">
		<form action="/catalog" method="POST" class="menu-item">
			<button class="button-form">
				<span class="icon"><img src="<?php echo get_template_directory_uri() ?>/assets/img/icon_menu-spark.svg" alt="icon"></span>
				<span class="title">Запчасти</span>
				<span class="right-line"><img src="<?php echo get_template_directory_uri() ?>/assets/img/dirt-02.svg" alt="icon"></span>
			</button>
			<input type="hidden" name="category" value="zapchasti">
		</form>
		<div class="item-sub-menu">

			<form action="/catalog" method="POST" class="menu-item-sub menu-item-sub-two<?php if( $slug1 == 'aksessuary' ){ echo ' nav-active'; } ?>">
				<button class="button-form menu-item-sub menu-item-sub-two">
					<span class="title">Аксессуары</span>
				</button>
				<input type="hidden" name="category" value="zapchasti">
				<input type="hidden" name="subcategory[]" value="aksessuary">
			</form>

			<form action="/catalog" method="POST" class="menu-item-sub menu-item-sub-two<?php if( $slug1 == 'kosmetika' ){ echo ' nav-active'; } ?>">
				<button class="button-form menu-item-sub menu-item-sub-two">
					<span class="title">Косметика</span>
				</button>
				<input type="hidden" name="category" value="zapchasti">
				<input type="hidden" name="subcategory[]" value="kosmetika">
			</form>

			<form action="/catalog" method="POST" class="menu-item-sub menu-item-sub-two<?php if( $slug1 == 'tormoznaya-sistema' ){ echo ' nav-active'; } ?>">
				<button class="button-form menu-item-sub menu-item-sub-two">
					<span class="title">Тормозная система</span>
				</button>
				<input type="hidden" name="category" value="zapchasti">
				<input type="hidden" name="subcategory[]" value="tormoznaya-sistema">
			</form>

			<form action="/catalog" method="POST" class="menu-item-sub menu-item-sub-two<?php if( $slug1 == 'czepi' ){ echo ' nav-active'; } ?>">
				<button class="button-form menu-item-sub menu-item-sub-two">
					<span class="title">Цепи</span>
				</button>
				<input type="hidden" name="category" value="zapchasti">
				<input type="hidden" name="subcategory[]" value="czepi">
			</form>

			<form action="/catalog" method="POST" class="menu-item-sub menu-item-sub-two<?php if( $slug1 == 'elementy-upravleniya' ){ echo ' nav-active'; } ?>">
				<button class="button-form menu-item-sub menu-item-sub-two">
					<span class="title">Элементы управления</span>
				</button>
				<input type="hidden" name="category" value="zapchasti">
				<input type="hidden" name="subcategory[]" value="elementy-upravleniya">
			</form>

		</div>
	</div>
	<div class="item-box item-box-hover">
		<form action="/catalog" method="POST" class="menu-item">
			<button class="button-form">
				<span class="icon"><img src="<?php echo get_template_directory_uri() ?>/assets/img/icon_menu-oil-bottle.svg" alt="icon"></span>
				<span class="title">Масла</span>
				<span class="right-line"><img src="<?php echo get_template_directory_uri() ?>/assets/img/dirt-02.svg" alt="icon"></span>
			</button>
			<input type="hidden" name="category" value="masla">
		</form>
		<div class="item-sub-menu">

			<form action="/catalog" method="POST" class="menu-item-sub menu-item-sub-two<?php if( $slug1 == 'motornye-masla' ){ echo ' nav-active'; } ?>">
				<button class="button-form menu-item-sub menu-item-sub-two">
					<span class="title">Моторные масла</span>
				</button>
				<input type="hidden" name="category" value="masla">
				<input type="hidden" name="subcategory[]" value="motornye-masla">
			</form>

			<form action="/catalog" method="POST" class="menu-item-sub menu-item-sub-two<?php if( $slug1 == 'smazki' ){ echo ' nav-active'; } ?>">
				<button class="button-form menu-item-sub menu-item-sub-two">
					<span class="title">Смазки</span>
				</button>
				<input type="hidden" name="category" value="masla">
				<input type="hidden" name="subcategory[]" value="smazki">
			</form>

			<form action="/catalog" method="POST" class="menu-item-sub menu-item-sub-two<?php if( $slug1 == 'uhod-za-czepyu' ){ echo ' nav-active'; } ?>">
				<button class="button-form menu-item-sub menu-item-sub-two">
					<span class="title">Уход за цепью</span>
				</button>
				<input type="hidden" name="category" value="masla">
				<input type="hidden" name="subcategory[]" value="uhod-za-czepyu">
			</form>

		</div>
	</div>
	<div class="item-box item-box-no-hover">
		<a href="/services" class="menu-item">
			<div class="button-form">
				<span class="icon"><img src="<?php echo get_template_directory_uri() ?>/assets/img/icon_menu-service.svg" alt="icon"></span>
				<span class="title">Сервис</span>
				<span class="right-line"><img src="<?php echo get_template_directory_uri() ?>/assets/img/dirt-02.svg" alt="icon"></span>
			</div>
		</a>
	</div>
	<div class="item-box item-box-no-hover">
		<a href="/sale" class="menu-item">
			<div class="button-form">
				<span class="icon"><img src="<?php echo get_template_directory_uri() ?>/assets/img/icon_menu-sale.svg" alt="icon"></span>
				<span class="title">Распродажа</span>
				<span class="right-line"><img src="<?php echo get_template_directory_uri() ?>/assets/img/dirt-02.svg" alt="icon"></span>
			</div>
		</a>
	</div>
</div>

<?php if(is_front_page()) { ?>

	<div class="menu-content menu-content-mobile">
		<div class="item-box item-box-hover">
			<form action="/catalog" method="POST" class="menu-item">
				<button class="button-form">
					<span class="icon"><img src="<?php echo get_template_directory_uri() ?>/assets/img/icon_menu-moto.svg" alt="icon"></span>
					<span class="title">Мототехника</span>
					<span class="right-line"><img src="<?php echo get_template_directory_uri() ?>/assets/img/dirt-02.svg" alt="icon"></span>
				</button>
				<input type="hidden" name="category" value="mototehnika">
			</form>
		</div>
		<div class="item-box item-box-hover">
			<form action="/catalog" method="POST" class="menu-item">
				<button class="button-form">
					<span class="icon">
						<img src="<?php echo get_template_directory_uri() ?>/assets/img/icon_menu-helmet.svg" alt="icon">
					</span>
					<span class="title">Снаряжение</span>
					<span class="right-line">
						<img src="<?php echo get_template_directory_uri() ?>/assets/img/dirt-02.svg" alt="icon">
					</span>
				</button>
				<input type="hidden" name="category" value="snaryazhenie">
			</form>
		</div>
		<div class="item-box item-box-hover">
			<form action="/catalog" method="POST" class="menu-item">
				<button class="button-form">
					<span class="icon"><img src="<?php echo get_template_directory_uri() ?>/assets/img/icon_menu-spark.svg" alt="icon"></span>
					<span class="title">Запчасти</span>
					<span class="right-line"><img src="<?php echo get_template_directory_uri() ?>/assets/img/dirt-02.svg" alt="icon"></span>
				</button>
				<input type="hidden" name="category" value="zapchasti">
			</form>
		</div>
		<div class="item-box item-box-hover">
			<form action="/catalog" method="POST" class="menu-item">
				<button class="button-form">
					<span class="icon"><img src="<?php echo get_template_directory_uri() ?>/assets/img/icon_menu-oil-bottle.svg" alt="icon"></span>
					<span class="title">Масла</span>
					<span class="right-line"><img src="<?php echo get_template_directory_uri() ?>/assets/img/dirt-02.svg" alt="icon"></span>
				</button>
				<input type="hidden" name="category" value="masla">
			</form>
		</div>
		<div class="item-box item-box-no-hover">
			<a href="/services" class="menu-item">
				<div class="button-form">
					<span class="icon"><img src="<?php echo get_template_directory_uri() ?>/assets/img/icon_menu-service.svg" alt="icon"></span>
					<span class="title">Сервис</span>
					<span class="right-line"><img src="<?php echo get_template_directory_uri() ?>/assets/img/dirt-02.svg" alt="icon"></span>
				</div>
			</a>
		</div>
		<div class="item-box item-box-no-hover">
			<a href="/sale" class="menu-item">
				<div class="button-form">
					<span class="icon"><img src="<?php echo get_template_directory_uri() ?>/assets/img/icon_menu-sale.svg" alt="icon"></span>
					<span class="title">Распродажа</span>
					<span class="right-line"><img src="<?php echo get_template_directory_uri() ?>/assets/img/dirt-02.svg" alt="icon"></span>
				</div>
			</a>
		</div>
	</div>
				
<?php } ?>
