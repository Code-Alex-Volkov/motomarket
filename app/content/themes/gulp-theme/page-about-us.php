<?php get_header(); ?>   
<div class="wrapper">
	<div class="main-condition"><a href="/">Главная </a><span> - О НАС</span></div>
	<div class="title-page"><?php the_title(); ?></div>

	<div class="contacts">
		
		<div class="left-content-wp">
			<?php the_content(); ?>
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