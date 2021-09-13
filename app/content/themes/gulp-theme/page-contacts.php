<?php get_header(); ?>   
<div class="wrapper">
	<div class="main-condition"><a href="/">Главная </a><span> - КОНТАКТЫ</span></div>
	<div class="title-page"><?php the_title(); ?></div>

	<div class="contacts">
		
		<div class="left-contacts">
			<?php the_content(); ?>
			<div class="block">
				<div class="item">
					<div class="title">Время работы:</div>
					<div class="text"><?php the_field('work-time'); ?></div>
				</div>
				<div class="item">
					<div class="title">Наш адрес:</div>
					<div class="text"><?php the_field('address'); ?></div>
				</div>
				<div class="item">
					<div class="title">Телефоны:</div>
					<?php if ( have_rows('telephones') ) {
							while ( have_rows('telephones') ) { the_row();?>

							<a href="tel:<?php the_sub_field('number'); ?>" class="text"><?php the_sub_field('number'); ?></a>

					<?php } } ?>
				</div>
				<div class="item">
					<div class="title">Наши реквизиты:</div>
					<div class="text"><?php the_field('requisites'); ?></div>
				</div>
			</div>
			<div class="map"><?php the_field('map'); ?></div>
		</div>

		<div class="right-contacts">
			<div class="form-content">
				<div class="title-form">У вас остались вопросы?<br>Задайте их нам!</div>
				<?php echo do_shortcode('[contact-form-7 id="108" title="Задать вопрос"]'); ?>
				<div class="politik-text">Нажимая на кнопку подтверждения вы принимаете условия <a href="<?php the_field('politika', 'option'); ?>" target="_blank">политики обработки персональных данных</a></div>
			</div>
		</div>

	</div>
</div>

<?php get_footer(); ?>