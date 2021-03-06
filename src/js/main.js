$(function () {
	'use strict';

	$('.product-type-variable .add_to_cart_button').on("click", function (event) {
		event.preventDefault();
	});

	$('.product.product-type-variable').find('.link-add-to-cart a').css('cursor', 'no-drop');

	$('.product-type-simple .add_to_cart_button').on("click", function () {
		$(this).parents('.on-click-product').find('.count-ok').fadeIn(700, function() {
			$(this).parents('.on-click-product').find('.count-ok').fadeOut();
		 });
	});

	$('.catalog-title-btn').on('click', function() {
		$('.menu-content-mobile-nav').toggle('active');
	});
	$('.btn-filter-form').on('click', function() {
		$('.catalog-content .left-filter').addClass('active-filter');
		$('.form-absolute').addClass('active');
		$('.catalog-content .blur-class').addClass('active');
	});

	$('.nav-mobile').on('click', function() {
		$('.content-mobile-nav').addClass('active');
		$("body").addClass("over-hidden");
	});
	$('.menu-close').on('click', function() {
		$('.content-mobile-nav').removeClass('active');
		$("body").removeClass("over-hidden");
	});
	$('.filter-close').on('click', function() {
		$('.catalog-content .left-filter').removeClass('active-filter');
		$('.form-absolute').removeClass('active');
		$('.catalog-content .blur-class').removeClass('active');
	});

	$('.slider-header').not('.slick-initialized').slick({
		dots: true,
		arrows: true,
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 576,
				settings: {
					arrows: false,
				}
			}
		]

	});

	$('.log-reg').on('click', function () {
		$('.u-column1').css('display', 'none');
		$('.u-column2').css('display', 'block');
	});

	$('.log-in').on('click', function () {
		$('.u-column1').css('display', 'block');
		$('.u-column2').css('display', 'none');
	});

	$('.input-focusin').focusout(function () {
		$('#catalogfilter').submit();
	});

	$(document).on('click', '.category-box label', function () {
		$(this).parents().find('form .filter-box-cat input[type="checkbox"]').prop("checked", false);
	});

	$(document).on('click', '.clear-btn', function () {
		$(this).parents().find('form input[type="radio"]').prop("checked", false);
		$(this).parents().find('form input[type="checkbox"]').prop("checked", false);
		$('.price-min').val($('#input-left').attr('min'));
		$('#input-left').val($('#input-left').attr('min'));
		$('.range').css('left', '0');
		$('.thumb.left').css('left', '0');

		$('.price-max').val($('#input-right').attr('max'));
		$('#input-right').val($('#input-right').attr('max'));
		$('.range').css('right', '0');
		$('.thumb.right').css('right', '0');

		$('.filter-box-cat').removeClass('active');
		$('#catalogfilter').submit();

	});

	$('.mototehnika-click').on('click', function () {
		$('.filter-box-cat').removeClass('active');
		$('.filter-box-cat.mototehnika').addClass('active');
	});
	$('.snaryazhenie-click').on('click', function () {
		$('.filter-box-cat').removeClass('active');
		$('.filter-box-cat.snaryazhenie').addClass('active');
	});
	$('.zapchasti-click').on('click', function () {
		$('.filter-box-cat').removeClass('active');
		$('.filter-box-cat.zapchasti').addClass('active');
	});
	$('.masla-click').on('click', function () {
		$('.filter-box-cat').removeClass('active');
		$('.filter-box-cat.masla').addClass('active');
	});

	var timeout;
	$('.woocommerce').on('change', '.qty', function () {
		// console.log('+');
		if (timeout !== undefined) {
			clearTimeout(timeout);
		}
		timeout = setTimeout(function () {
			$("[name='update_cart']").trigger("click");
		}, 1000);
	});

	$('.cross-sells > h2').text('?????? ?????????? ??????????????????');

	$('.radio-salefilter').on('click', function () {
		$(this).parents('.select-class').addClass('active');
	});
	$('.option-class label').on('click', function () {
		let spanText = $(this).find('span').text();
		$(this).parents('.select-class').find('.radio-salefilter').text(spanText);
		$(this).parents('.select-class').removeClass('active');
	});

	function setLeftValue() {
		let min = parseInt($("#input-left").attr('min')), // ???????????????????? ???????????????????? ??????????
			max = parseInt($("#input-left").attr('max')), // ?????????????????????? ???????????????????? ??????????
			text = Math.min(parseInt($("#input-left").val()), parseInt($("#input-right").val()) - 1), // ?????????????????????? ???????????????? ????????????????
			percent = ((text - min) / (max - min)) * 100; // % ???????????? ????????????????

		$("#input-left").val(text);
		$(".price-min").val(text.toString().replace(/(\d)(?=(\d{3})+(\D|$))/g, '$1 ') + ' P');
		$(".slider > .thumb.left").css('left', percent + "%");
		$(".slider > .range").css('left', percent + "%");
	}
	setLeftValue();

	function setRightValue() {
		let min = parseInt($("#input-right").attr('min')),
			max = parseInt($("#input-right").attr('max')),
			text = Math.max(parseInt($("#input-right").val()), parseInt($("#input-left").val()) + 1),
			percent = ((text - min) / (max - min)) * 100;

		$("#input-right").val(text);
		$(".price-max").val(text.toString().replace(/(\d)(?=(\d{3})+(\D|$))/g, '$1 ') + ' P');
		$(".slider > .thumb.right").css('right', (100 - percent) + "%");
		$(".slider > .range").css('right', (100 - percent) + "%");
	}
	setRightValue(); 

	$("#input-left").bind("input", setLeftValue);
	$("#input-right").bind("input", setRightValue);

	$('.input-submit').on('click', function () {
		$('#catalogfilter').submit();
		$('.number-span').text(12);
	});

	$('.input-sale').on('click', function () {
		$('#salefilter').submit();
		$('.number-span').text(12);
	});

	// ?????????????????? ??????????????
	$('#salefilter').on('submit', function () {
		let filter = $('#salefilter');
		$.ajax({
			url: filter.attr('action'),
			data: filter.serialize(), // form data
			type: filter.attr('method'), // POST
			beforeSend: function (xhr) {
				filter.find('button').text('????????????????...');
				$('#filter-loader').show();
			},
			success: function (data) {
				$('#filter-loader').hide();
				filter.find('button').text('?????????????????? ????????????');
				$('#response').html(data);
			}
		});
		return false;
	});

	// ?????????????????? ??????????????
	$('#archivefilter').on('submit', function () {
		let filter = $('#archivefilter');
		$.ajax({
			url: filter.attr('action'),
			data: filter.serialize(), // form data
			type: filter.attr('method'), // POST
			beforeSend: function (xhr) {
				filter.find('button').text('????????????????...');
				$('#filter-loader').show();
			},
			success: function (data) {
				$('#filter-loader').hide();
				filter.find('button').text('?????????????????? ????????????');
				$('#response').html(data);
			}
		});
		return false;
	});

	$('#catalogfilter').on('submit', function () {
		let filter = $('#catalogfilter');
		$.ajax({
			url: filter.attr('action'),
			data: filter.serialize(), // form data
			type: filter.attr('method'), // POST
			beforeSend: function (xhr) {
				filter.find('button.filter-btn').text('????????????????...');
				$('#filter-loader').show();
			},
			success: function (data) {
				$('#filter-loader').hide();
				filter.find('button.filter-btn').text('???????????????? ????????????');
				$('#response').html(data);
			}
		});
		return false;
	});

	$('#true_loadmore').on('click', function () {
		$('#true_loadmore .show_more').text('????????????????...'); // ???????????????? ?????????? ????????????, ???? ?????????? ???????????? ???????????????? ??????????????????
		var data = {
			'action': 'loadmore',
			'query': true_posts,
			'page': current_page
		};

		let productLength = $('#response').find('li.product').length;
		let numberSpan = $('.number-span').text();
		let prLength = foundPosts - productLength;
		$.ajax({
			url: url, // ????????????????????
			data: data, // ????????????
			type: 'POST', // ?????? ??????????????
			success: function (data) {
				if (data) {
					$('#true_loadmore').html('<button class="show_more btn_click"><span class="btn_text">???????????????? ??????</span></button>').before(data); // ?????????????????? ?????????? ??????????
					current_page++; // ?????????????????????? ?????????? ???????????????? ???? ??????????????
					// let math = Math.floor(data.length / 2936);

					// let numberSpan = $('.number-span').text();

					if (current_page == max_pages) $("#true_loadmore").remove(); // ???????? ?????????????????? ????????????????, ?????????????? ????????????
				} else {
					$('#true_loadmore').remove(); // ???????? ???? ?????????? ???? ?????????????????? ???????????????? ????????????, ???????????? ????????????
				}

				if (prLength < 12) {
					$('.number-span').text(parseInt(numberSpan) + prLength);
				} else {
					$('.number-span').text(parseInt(numberSpan) + 12);
				}
			}
		});
	});

	$('#catalog_loadmore').on('click', function () {
		$('#catalog_loadmore .show_more').text('????????????????...'); // ???????????????? ?????????? ????????????, ???? ?????????? ???????????? ???????????????? ??????????????????
		var data = {
			'action': 'catalogloadmore',
			'query': true_posts,
			'page': current_page
		};

		let productLength = $('#response').find('li.product').length;
		let numberSpan = $('.number-span').text();
		let prLength = foundPosts - productLength;

		$.ajax({
			url: url, // ????????????????????
			data: data, // ????????????
			type: 'POST', // ?????? ??????????????
			success: function (data) {
				if (data) {
					$('#catalog_loadmore').html('<button class="show_more btn_click"><span class="btn_text">???????????????? ??????</span></button>').before(data); // ?????????????????? ?????????? ??????????
					current_page++; // ?????????????????????? ?????????? ???????????????? ???? ??????????????		
					if (current_page == max_pages) $("#catalog_loadmore").remove(); // ???????? ?????????????????? ????????????????, ?????????????? ????????????
				} else {
					$('#catalog_loadmore').remove(); // ???????? ???? ?????????? ???? ?????????????????? ???????????????? ????????????, ???????????? ????????????
				}
				if (prLength < 12) {
					$('.number-span').text(parseInt(numberSpan) + prLength);
				} else {
					$('.number-span').text(parseInt(numberSpan) + 12);
				}
			}
		});
	});

	$('.quest').on('click', function () {
		if ($(this).parents('.question-answer').hasClass('active')) {
			$(this).parents('.question-answer').removeClass('active');
		} else {
			$('.quest').parents('.question-answer').removeClass('active');
			$(this).parents('.question-answer').addClass('active');
		}
	});


	$('.single_add_to_cart_button .cart-title').text('?? ??????????????');

	/* Slider Inner Page */
	$('.product-gallery-slider-big').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		asNavFor: '.product-gallery-slider-thumbs',
	});
	$('.product-gallery-slider-thumbs').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		asNavFor: '.product-gallery-slider-big',
		dots: false,
		infinite: true,
		appendArrows: $(".singleProductNavigation"),
		prevArrow: '<buttom class="slick-prev"><span class="arr"></span></buttom>',
		nextArrow: '<buttom class="slick-next"><span class="arr"></span></buttom>',
		focusOnSelect: true,
	});

	document.addEventListener('wpcf7mailsent', function (event) {
		$('.popup-modal').fadeOut(400);
		$('.popup-feedback').fadeOut(400);
		$(".popup-ok").fadeIn(400);
	}, false);

	$('.popup-open').on('click', function () {
		$("body").addClass("overhidden");
		$('.popup-modal').fadeIn(300);
	});
	$('.popup-open-feedback').on('click', function () {
		$("body").addClass("overhidden");
		$('.popup-feedback').fadeIn(300);
	});
	$('.popup-close').on('click', function () {
		$("body").removeClass("overhidden");
		$('.popup').fadeOut(300);
	});

	// $(document).on('click', function (event) {
	// 	if (!$(event.target).closest(".popup-open, .popup-open-feedback, .popup-content").length) {
	// 		$("body").find(".popup").fadeOut(400);
	// 		$("body").removeClass("overhidden");
	// 	}
	// });

	function getSliderSettings() {
		return {
			autoplay: true,
			dots: true,
			infinite: true,
			slidesToShow: 2,
			slidesToScroll: 1,
			appendArrows: $(".slider-navigation"),
			prevArrow: '<buttom class="slick-prev"><span class="arr"></span></buttom>',
			nextArrow: '<buttom class="slick-next"><span class="arr"></span></buttom>',
			responsive: [
				{
					breakpoint: 576,
					settings: {
						arrows: false,
					}
				}
			]
		}
	}
	$(".slider-tab").not('.slick-initialized').slick(getSliderSettings());

	$('.input-submit').on('click', function () {
		$('#sliderform').submit();
	});

	// ?????????????????? ??????????????
	$('#sliderform').submit(function () {
		let filter = $('#sliderform');
		$.ajax({
			url: filter.attr('action'),
			data: filter.serialize(), // form data
			type: filter.attr('method'), // POST
			beforeSend: function (xhr) {
				$('.loader').show();
			},
			success: function (data) {
				setTimeout(function () {
					$('.loader').hide();
					$('.slider-tab').slick('unslick');
					$('#response').html(data);
					$('.slider-tab').not('.slick-initialized').slick(getSliderSettings());
					$('.product-type-simple .add_to_cart_button').on("click", function () {
					$(this).parents('.product').find('.count-ok').fadeIn(700, function() {
						$(this).parents('.product').find('.count-ok').fadeOut();
					});
				});
				}, 300);
			}
		});
		return false;
	});



	$(".item-box-hover").hover(function () {
		$(this).addClass('active');
	}, function () {
		$(this).removeClass('active');
	});

	$(".item-box-no-hover").hover(function () {
		$(this).addClass('active');
	}, function () {
		$(this).removeClass('active');
	});

	$('.tab-item').click(function () {
		let text = $(this).text();
		setTimeout(function () {
			$('.title-category').text(text);
		}, 1000);

		$('.tab-item').removeClass('active');
		$(this).addClass('active');
	})

	$(".instagram-box").not('.slick-initialized').slick({
		autoplay: true,
		autoplaySpeed: 700000000,
		dots: true,
		rows: 1,
		arrows: true,
		infinite: true,
		slidesToShow: 2,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 576,
				settings: {
					arrows: false,
					rows: 2,
					slidesToShow: 1,
					slidesToScroll: 1,
					dots: true,
				}
			}
		]
	});

	$('.slick-prev').html('<span class="arr"></span>');
	$('.slick-next').html('<span class="arr"></span>');

});