<div class="popup popup-modal">
	<div class="popup-dialog">
		<div class="popup-content">
			<div class="popup-close">
				<span class="top-line"></span>
				<span class="bottom-line"></span>
			</div>
			<div class="form-popup">
				<div class="title-popup">Заявка на сервис</div>
				<div class="subtitle-popup">Заполните форму и наш менеджер свяжется <br>с вами в течение рабочего дня.</div>
				<?php echo do_shortcode('[contact-form-7 id="5" title="Заявка на сервис"]'); ?>
				<div class="politik-text">Нажимая на кнопку подтверждения вы принимаете условия <a href="<?php the_field('politika', 'option'); ?>" target="_blank">политики обработки персональных данных</a></div>
			</div>
		</div>
	</div>
</div>

<div class="popup popup-feedback">
	<div class="popup-dialog">
		<div class="popup-content">
			<div class="popup-close">
				<span class="top-line"></span>
				<span class="bottom-line"></span>
			</div>
			<div class="form-popup">
				<div class="title-popup">Обратная связь</div>
				<div class="subtitle-popup">Заполните форму и наш менеджер свяжется <br>с вами в течение рабочего дня.</div>
				<?php echo do_shortcode('[contact-form-7 id="211" title="Обратная связь"]'); ?>
				<div class="politik-text">Нажимая на кнопку подтверждения вы принимаете условия <a href="<?php the_field('politika', 'option'); ?>" target="_blank">политики обработки персональных данных</a></div>
			</div>
		</div>
	</div>
</div>

<div class="popup popup-ok">
	<div class="popup-dialog">
		<div class="popup-content">
			<div class="popup-close">
				<span class="top-line"></span>
				<span class="bottom-line"></span>
			</div>
			<div class="form-popup">
				<img class="img-ok" src="<?php echo get_template_directory_uri(); ?>/assets/img/airplane.svg" alt="ok">
				<span class="title-popup">Заявка успешно <br>отправлена</span>
				<span class="subtitle-popup">Мы свяжемся с вами <br>в ближайшее время!</span>
			</div>
		</div>
	</div>
</div>