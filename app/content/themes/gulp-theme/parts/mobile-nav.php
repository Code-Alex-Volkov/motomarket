<div class="content-mobile-nav">
	<div class="title-mobile-nav">Мотомагазин MotoMarket</div>
	<div class="box-menu-1">
		<?php global $woocommerce; ?>
		<a class="basket-btn<?php if($url == 'edit-account') { echo ' active'; } ?>" href="/my-account/edit-account/">
			<img src="<?php echo get_template_directory_uri() ?>/assets/img/icon-account-user.svg" alt="cart">
			<span class="basket-btn-counter">Профиль</span>
		</a>
		<a class="basket-btn" href="<?php echo esc_url( wc_get_cart_url() );?>">
			<img src="<?php echo get_template_directory_uri() ?>/assets/img/icon-account-cart.svg" alt="cart">
			<span class="basket-btn-counter">
				Корзина
				<?php 
					if($woocommerce->cart->cart_contents_count) { 
						echo '( ' .sprintf($woocommerce->cart->cart_contents_count) . ' )';
					} else { 
						echo '( 0 )';
					}
				?>
			</span>
		</a>
	</div>
	<div class="box-menu-2">
		<div class="catalog-menu">

			<div class="catalog-title">Каталог</div>

			<div class="menu-content">

				<div class="item-box item-box-hover">
					<form action="/catalog" method="POST" class="menu-item">
						<button class="button-form">
							<span class="title">Мототехника</span>
						</button>
						<input type="hidden" name="category" value="mototehnika">
					</form>
				</div>
				<div class="item-box item-box-hover">
					<form action="/catalog" method="POST" class="menu-item">
						<button class="button-form">
							<span class="title">Снаряжение</span>
						</button>
						<input type="hidden" name="category" value="snaryazhenie">
					</form>
				</div>
				<div class="item-box item-box-hover">
					<form action="/catalog" method="POST" class="menu-item">
						<button class="button-form">
							<span class="title">Запчасти</span>
						</button>
						<input type="hidden" name="category" value="zapchasti">
					</form>
				</div>
				<div class="item-box item-box-hover">
					<form action="/catalog" method="POST" class="menu-item">
						<button class="button-form">
							<span class="title">Масла</span>
						</button>
						<input type="hidden" name="category" value="masla">
					</form>
				</div>
				<div class="item-box item-box-no-hover">
					<a href="/services" class="menu-item">
						<div class="button-form">
							<span class="title">Сервис</span>
						</div>
					</a>
				</div>
				<div class="item-box item-box-no-hover">
					<a href="/sale" class="menu-item">
						<div class="button-form">
							<span class="title">Распродажа</span>
						</div>
					</a>
				</div>

			</div>

		</div>
		<ul class="top-right-menu-mobile">
			<li class="<?php if( $slug == 'about-us' ){ echo 'menu-active'; } ?>"><a href="/about-us">О нас</a></li>
			<li class="<?php if( $slug == 'oplata' ){ echo 'menu-active'; } ?>"><a href="/oplata">Оплата</a></li>
			<li class="<?php if( $slug == 'dostavka' ){ echo 'menu-active'; } ?>"><a href="/dostavka">Доставка</a></li>
			<li class="<?php if( $slug == 'warranty' ){ echo 'menu-active'; } ?>"><a href="/warranty">Гарантия и возврат</a></li>
			<li class="<?php if( $slug == 'faq' ){ echo 'menu-active'; } ?>"><a href="/faq">Вопросы и ответы</a></li>
			<li class="<?php if( $slug == 'contacts' ){ echo 'menu-active'; } ?>"><a href="/contacts">Контакты</a></li>
		</ul>
	</div>
	<div class="box-menu-3">
		<div class="box-soc-title">Мы в соц. сетях:</div>
		<ul class="social">
			<li><a href="https://vk.com/<?php the_field('vk', 110 ); ?>" target="_blank"><span class="icon"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="vk" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-vk fa-w-18"><path fill="currentColor" d="M545 117.7c3.7-12.5 0-21.7-17.8-21.7h-58.9c-15 0-21.9 7.9-25.6 16.7 0 0-30 73.1-72.4 120.5-13.7 13.7-20 18.1-27.5 18.1-3.7 0-9.4-4.4-9.4-16.9V117.7c0-15-4.2-21.7-16.6-21.7h-92.6c-9.4 0-15 7-15 13.5 0 14.2 21.2 17.5 23.4 57.5v86.8c0 19-3.4 22.5-10.9 22.5-20 0-68.6-73.4-97.4-157.4-5.8-16.3-11.5-22.9-26.6-22.9H38.8c-16.8 0-20.2 7.9-20.2 16.7 0 15.6 20 93.1 93.1 195.5C160.4 378.1 229 416 291.4 416c37.5 0 42.1-8.4 42.1-22.9 0-66.8-3.4-73.1 15.4-73.1 8.7 0 23.7 4.4 58.7 38.1 40 40 46.6 57.9 69 57.9h58.9c16.8 0 25.3-8.4 20.4-25-11.2-34.9-86.9-106.7-90.3-111.5-8.7-11.2-6.2-16.2 0-26.2.1-.1 72-101.3 79.4-135.6z" class=""></path></svg></span></a></li>
			<li><a href="https://www.instagram.com/<?php the_field('instagram', 110 ); ?>" target="_blank"><span class="icon"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-instagram fa-w-14"><path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" class=""></path></svg></span></a></li>
		</ul>
	</div>

</div>