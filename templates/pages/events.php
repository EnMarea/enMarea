<?php

use Jenssegers\Date\Date;

$social = new SocialLinks\Page([
    'url' => $this->url('events'),
    'title' => 'Axenda - En marea',
    'text' => 'En Marea, a alternativa de cambio en Galicia. Coñece a Luís Villares, o futuro presidente da Xunta',
    'image' => $this->asset('img/img-rrss.png'),
    'twitterUser' => '@en_marea',
]);

$this->layout('layouts/default', ['menu' => 'events', 'social' => $social]);

//Ordenar eventos por data
$time = 'past';
$days = [
	'past' => [],
	'future' => [],
];
$today = date('Y-m-d');
$nameDays = [
    date('Y-m-d') => 'hoxe',
    date('Y-m-d', strtotime('+1 day')) => 'mañá',
    date('Y-m-d', strtotime('-1 day')) => 'onte',
];

foreach ($events as $event) {
    $key = $event->day->format('Y-m-d');

    if ($key >= $today) {
    	$time = 'future';
    }

    if (!isset($days[$time][$key])) {
        $days[$time][$key] = [
            'title' => isset($nameDays[$key]) ? $nameDays[$key] : Date::instance($event->day)->format('l j F'),
            'class' => '',
            'events' => [],
        ];

        if ($days[$time][$key]['title'] === 'hoxe') {
            $days[$time][$key]['class'] = ' is-opened';
        }
    }

    $days[$time][$key]['events'][] = $event;
}
?>

<?php $this->start('extra-head') ?>
<link rel="stylesheet" type="text/css" href="<?= $this->asset('css/pages/events.css') ?>">
<?php $this->stop(); ?>

<div class="page-header-container">
	<header class="page-header">
		<h1>#RutaEnMarea</h1>
		<p>Movémonos para cambiar Galicia</p>
	</header>
</div>

<div class="page-content">
	<div class="page-events">
		<?php foreach ($days['future'] as $day): ?>
		<div class="page-events-day<?= $day['class'] ?>">
			<h3 class="js-toggle"><?= $day['title'] ?></h3>
			<ul class="eventList">
				<?php
                foreach ($day['events'] as $event) {
                    $this->insert('partials/events/list', ['event' => $event]);
                }
                ?>
			</ul>
		</div>
		<?php endforeach ?>

		<?php $comun = $app->get('texts')['comun']; ?>
		<a href="<?= $comun->rrss->telegram->url ?>" class="button has-icon">
			<span class="button-icon">
				<?= $this->svg('ico-telegram')->withA11y($comun->rrss->telegram->title) ?>
			</span>
			<strong>
				Sigue o día a día da campaña na nosa canle de Telegram
			</strong>
		</a>

		<h2>Tamén estivemos en:</h2>

		<?php foreach ($days['past'] as $day): ?>
		<div class="page-events-day<?= $day['class'] ?>">
			<h3 class="js-toggle is-past"><?= $day['title'] ?></h3>
			<ul class="eventList">
				<?php
                foreach ($day['events'] as $event) {
                    $this->insert('partials/events/list', ['event' => $event]);
                }
                ?>
			</ul>
		</div>
		<?php endforeach ?>
	</div>
	<div class="page-timeline">
		<a class="twitter-timeline" href="https://twitter.com/hashtag/rutaEnMarea" data-chrome="noheader nofooter noborders" data-widget-id="769118986873233408">#rutaEnMarea Tweets</a>
        
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>
</div>
