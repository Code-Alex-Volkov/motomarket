<?php get_header(); ?>   

<div class="wrapper" >
	<div class="main-condition"><a href="/">Главная </a><span> - СЕРВИС</span></div>
	<div class="title-page">СЕРВИС</div>
	<div class="photo"><img src="<?php echo get_template_directory_uri() ?>/assets/img/bg-services.jpg" alt="#" /></div>

	<div class="content-serveces">
		<div class="left-content-wp">
			<?php the_content(); ?>
			<h3>Прайс-листы со стоимостью ТО мотоциклов и шиномонтажа:</h3>
			<ul>
				<?php if ( have_rows('services') ) {
						while ( have_rows('services') ) { the_row();?>

						<li>
							<a href="<?php the_sub_field('service-fail'); ?>" target="_blank"><?php the_sub_field('service-name'); ?></a>
						</li>

				<?php } } ?>
			</ul>
		</div>

		<div class="right-content-wp">

			<div class="window-content">


				<!-- <div class="title-form">У вас остались вопросы?<br>Задайте их нам!</div> -->
				<!-- <?php echo do_shortcode('[contact-form-7 id="108" title="Задать вопрос"]'); ?> -->
				<!-- <div class="politik-text">Нажимая на кнопку подтверждения вы принимаете условия <a href="/politika">политики обработки персональных данных</a></div> -->

				<ul>
					<li>
						<img src="<?php echo get_template_directory_uri() ?>/assets/img/icon-services_01.svg" alt="">
						<span class="link">Техобслуживание</span>
					</li>
					<li>
						<img src="<?php echo get_template_directory_uri() ?>/assets/img/icon-services_03.svg" alt="">
						<span class="link">Ремонтные работы</span>
					</li>
					<li>
						<img src="<?php echo get_template_directory_uri() ?>/assets/img/icon-services_04.svg" alt="">
						<span class="link">Зимнее хранение</span>
					</li>
					<li>
						<img src="<?php echo get_template_directory_uri() ?>/assets/img/icon-services_02.svg" alt="">
						<span class="link">Замена масел</span>
					</li>
					<li>
						<img src="<?php echo get_template_directory_uri() ?>/assets/img/icon-services_05.svg" alt="">
						<span class="link">Мотошиномонтаж</span>
					</li>
				</ul>

				<button class="popup-open">Заявка на ремонт</button>

			</div>
			
		</div>
	</div>
</div>

<?php get_footer(); ?>