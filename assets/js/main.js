var $ = require('jquery');

/* Abrir/pechar o menú */
$nav = $('.js-navigation');

$('.js-toggle').click(function (e) {
	$(this).parent().toggleClass('is-opened');
});

/* Cabeceira "sticky" */
var sticked = false;
var $window = $(window);
var $html = $('html');

$window.on('scroll', function() {
    let pos = $window.scrollTop();

    if (pos > 0 && !sticked) {
        $html.addClass('is-scrolled');
        sticked = true;
    } else if (pos === 0 && sticked) {
        $html.removeClass('is-scrolled');
        sticked = false;
    }
});