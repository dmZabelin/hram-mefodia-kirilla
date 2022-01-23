jQuery(function ($) {
	"use strict";

	// Слайдеры
	var $main_slider = $('.main-slider');
	var $preaching_slider = $('.preaching-slider');

	if ($main_slider.length) {
		$main_slider.slick({
			arrows: false,
			dots: true,
			fade: true,
			autoplay: true,
			autoplaySpeed: 3000,
			speed: 2500
		});
	}

	if ($preaching_slider.length) {
		$preaching_slider.slick({
			dots: true,
			slidesToShow: 3,
			prevArrow: '<button class="slick-prev"><img src="https://hram-kirilla-mefodiya.od.ua/wp-content/themes/hram-kirilla-mefodiya/assets/img/back.png" alt="test"></button>',
			nextArrow: '<button class="slick-next"><img src="https://hram-kirilla-mefodiya.od.ua/wp-content/themes/hram-kirilla-mefodiya/assets/img/next.png" alt="next"></button>',
			responsive: [
				{
					breakpoint: 992,
					settings: {
						slidesToShow: 2
					}
				}, {
					breakpoint: 768,
					settings: {
						slidesToShow: 2
					}
				}, {
					breakpoint: 577,
					settings: {
						slidesToShow: 1
					}
				}
			]
		});
	}

	// Аккардеон "Ответ - вопрос"
	if ($('.answers-info__close').length) {
		$(document).on('click', '.answers-info__close', function (e) {
			e.preventDefault();
			$(this).parent().find('.answers-info__answer').slideToggle('slow');
			$(this).find('i.fas').toggleClass('active');
		});
	}

	// Меню Гамбургер, меню мобильная версия
	$(".humburger").on('click', function (e) {
		e.preventDefault;
		$(this).toggleClass("mh_active");
		$('.menu-open').toggleClass('menu-show');
		$('body').toggleClass('hidden');
	})
	$('.mobileMenu li a').click(function (e) {
		$('.humburger').removeClass('mh_active');
		$('.menu-open').removeClass('menu-show');
		$('body').removeClass('hidden');
	});

	// AJAX подгрузка ответ вопрос
	if ($('.load-more').length) {
		var loading = false;

		$('.load-more').on('click', function (e) {
			e.preventDefault();
			var $offset = $(this).data('offset');
			if (!loading) {
				loading = true;
				var data = {
					action: 'dmz_ajax_load_more',
					nonce: dmzloadmore.nonce,
					offset: $offset,
					beforeSend: function (xhr) {
						$('.load-more span').text('Загрузка...');
					},
				};

				$.post(dmzloadmore.ajaxurl, data, function (res) {

					if (res.success) {
						$('.load-more span').text('еще...');
						var $content = $(res.data);

						$('.answers-item').append($content);
						$('.load-more').data('offset', parseInt($offset + 3));

						var num_one = $('.load-more').data('posts');

						if (num_one <= ($offset + 3)) {
							$('.load-more').remove();
						}

						loading = false;
					} else {
						//console.log(res);
					}
				}).fail(function (xhr, textStatus, e) {
					//console.log(xhr.responseText);
				});
			}
		});

		$(document).ready(function () {
			var num_one = $('.load-more').data('offset');
			var num_two = $('.load-more').data('posts');

			if (num_one >= num_two) {
				$('.load-more').remove();
			}
		});

	}

	//Отправка формы
	if ($('.abbot-form').length) {

		$('.abbot-form').on('submit', function (e) {
			e.preventDefault();

		});

		$.validator.addMethod(
			"regex",
			function (value, element, regexp) {
				var re = new RegExp(regexp);
				return this.optional(element) || re.test(value);
			},
			"Please check your input."
		);

		// Проверка на валидацию формы
		function valEl(el) {

			el.validate({
				rules: {
					name: {
						required: true,
						regex: '^[A-Za-zА-Яа-яЁё\x20]{2,20}$'
					},
					email: {
						required: false,
						email: true
					}
				},
				messages: {
					name: {
						required: 'Поле обязательно для заполнения',
						regex: 'Введите имя правильно'
					},
					email: {
						required: false,
						email: 'Введите e-mail правильно'
					}

				},

				// Начинаем проверку id="" формы
				submitHandler: function (form) {

					var $form = $(form);
					var $formId = $form.attr('id');
					var response = grecaptcha.getResponse();

					//Функция google recapcha
					if (response.length == 0) {

						$('.abbot-form .error-re').fadeIn();
						return false;

					} else {

						if ($formId == 'abbot-form') {
							$('.abbot-form .error-re').hide();
							$('.abbot-form .loader').fadeIn();
						}

						switch ($formId) {
							case 'abbot-form':

								var data = $form.serialize();

								$.post(window.dmz_ajax.ajaxurl + '?action=homeanswer', data, 'json')
									.always(function () {
										$('.abbot-form .loader').fadeOut();
										setTimeout(function () {
											$('.abbot-form .tnx').fadeIn();
											//строки для остлеживания целей в Я.Метрике и Google Analytics
										}, 500);
										setTimeout(function () {
											$('.abbot-form .tnx').fadeOut();
										}, 3000);
										$form.trigger('reset');
									});

								break;
						}

						grecaptcha.reset();

						return false;
					}
				}
			});
		};

		// Запускаем механизм валидации форм
		$('.abbot-form').each(function () {
			valEl($(this));
		});
	}

	//Расписание богослужений табы
	var tab = $('.schedule-item-wrap .schedule-item-calendar');
	tab.hide().filter(':first').show();

	// Клики по вкладкам.
	$('.the-date').on('click', function (e) {
		e.preventDefault;
		tab.hide();
		tab.filter(this.hash).show();
		$('.the-date').removeClass('active');
		$(this).addClass('active');
		return false;
	});

	//Слово настоятеля табы главная
	var tab_word = $('.word-item-wrapper .word-item');
	tab_word.hide().filter(':first').show();

	// Клики по вкладкам.
	$('.word').on('click', function (e) {
		e.preventDefault;
		tab_word.hide();
		tab_word.filter(this.hash).show();
		$(".preaching-slider").slick('refresh');
		$('.word').removeClass('active');
		$(this).addClass('active');
		return false;
	});

	//Слово настоятеля табы страница архива
	var tab_preaching = $('.preaching-items-wrapper .preaching-items');
	tab_preaching.hide().filter(':first').show();

	// Клики по вкладкам.
	$('.preaching-link').on('click', function (e) {
		e.preventDefault;
		tab_preaching.hide();
		tab_preaching.filter(this.hash).show();
		$('.preaching-link').removeClass('active');
		$(this).addClass('active');
		return false;
	});



	//Священослужители ТАБЫ
	var tab_priests = $('.category-priests-tabs .priests-wrapper');
	tab_priests.hide().filter(':first').show();




	// Клики по вкладкам.
	$('.category-link').on('click', function (e) {
		e.preventDefault;
		tab_priests.hide();
		tab_priests.filter(this.hash).show();
		$('.category-link').removeClass('active');
		$(this).addClass('active');
		return false;
	});

	$('.not-active-link').on('click', function () {
		return false;
	});

});