var $ = require('jquery');

/* Abrir/pechar cousas */
$('.js-toggle').click(function (e) {
	$(this).parent().toggleClass('is-opened');
});

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