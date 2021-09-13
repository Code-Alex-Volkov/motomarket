<?php get_header(); ?>

<div class="wrapper">
	<div class="main-ask"><a href="/">Главная </a><span> - ВОПРОСЫ И ОТВЕТЫ</span></div>
	<div class="title-page"><?php the_title(); ?></div>
	<div class="content-faq">
		<div class="left-faq">
			<?php the_content(); ?>

			<div class="ask">

				<?php if ( have_rows('faq-box') ) {
					while ( have_rows('faq-box') ) { the_row();?>

						<div class="question-answer">
							<div class="question">
								<div class="quest"><?php the_sub_field('quest'); ?></div>
							</div>
							<div class="answer"><p><?php the_sub_field('answer'); ?></p></div>
						</div>

				<?php } } ?>

			</div>
		</div>

		<div class="right-faq">
			<div class="form-content">
				<div class="title-form">У вас остались вопросы?<br>Задайте их нам!</div>
				<?php echo do_shortcode('[contact-form-7 id="108" title="Задать вопрос"]'); ?>
				<div class="politik-text">Нажимая на кнопку подтверждения вы принимаете условия <a href="<?php the_field('politika', 'option'); ?>" target="_blank">политики обработки персональных данных</a></div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>