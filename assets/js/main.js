var $ = require('jquery');

require('minitabs');
require('magnific-popup');

/* Abrir/pechar cousas */
$('.js-toggle').on('click', function (e) {
	$(this).parent().toggleClass('is-opened');
});

/* Abrir/pechar cousas con focus */
$('.js-toggle-focus')
	.on('focus', function (e) {
		$(this).parent().addClass('is-opened');
	})
	.on('blur', function () {
		var $parent = $(this).parent();

		setTimeout(function () {
			$parent.removeClass('is-opened');
		}, 100);
	})
	.on('touchstart', function (e) {
		if (/iPad|iPhone|iPod/g.test(navigator.userAgent)) {
			var $parent = $(this).parent();
			setTimeout(function () {
				$parent.toggleClass('is-opened');
			}, 100);
		}
	})

$('.js-toggle-focus')

/* Cabeceira "sticky" */
var sticked = false;
var $window = $(window);
var $html = $('html');

$window.on('scroll', function() {
    var pos = $window.scrollTop();

    if (pos > 5 && !sticked) {
        $html.addClass('is-scrolled');
        sticked = true;
    } else if (pos < 5 && sticked) {
        $html.removeClass('is-scrolled');
        sticked = false;
    }
}).trigger('scroll');

/* Filtro */
$('.js-filter').click(function (e) {
	var $target = $(e.target);

	$target.addClass('is-actived').siblings().removeClass('is-actived');

	$($(this).data('target'))
		.children()
		.hide()
		.filter($target.data('filter'))
		.show();
});

/* Compartir nas redes sociais */
$('.js-share').click(function (e) {
	e.preventDefault();

    window.open($(this).attr('href'), 'share', 'toolbar=0, status=0, width=650, height=360');
});

/* Mensaxe de cookies */
$cookies = $('.js-cookies');
var cookies = localStorage.getItem('accept-cookies');

if (cookies !== 'accepted') {
    $cookies.removeClass('is-accepted');
}

$cookies.find('.js-cookies-accept').on('click', function () {
    $cookies.fadeOut('normal');
    localStorage.setItem('accept-cookies', 'accepted');
});

/* Minitabs */
$('.js-tabs').tabs({
	indexSelector: '> nav a',
	contentSelector: '> section',
	clickFirst: true
});

/* Popups */
$('.js-inline-gallery').each(function () {
	$(this).magnificPopup({
		delegate: '.js-inline-gallery-element',
		type: 'inline',
		gallery: {
			enabled: true,
			tPrev: 'Anterior (Tecla flecha á esquerda)',
		    tNext: 'Seguinte (Tecla flecha á dereita)',
		    tCounter: '%curr% de %total%'
		}
	});
});

