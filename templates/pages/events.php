<?php

use Jenssegers\Date\Date;

$social = new SocialLinks\Page([
	'url' => $this->url('events'),
	'title' => 'Axenda - En marea',
]);

$this->layout('layouts/default', ['menu' => 'events', 'social' => $social]);

//Ordenar eventos por data
$days = [];
$today = date('Y-m-d');

foreach ($events as $event) {
	$day = $event->day;
	$key = $day->format('Y-m-d');

	if (!isset($days[$key])) {
		$days[$key] = [];
	}

	$days[$key][] = $event;
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
		<?php foreach ($days as $k => $day): ?>
		<div class="page-events-day<?= $k === $today ? ' is-opened' : '' ?>">
			<h2 class="js-toggle"><?= Date::instance($day[0]->day)->format('l j F') ?></h2>
			<ul class="eventList">
				<?php
				foreach ($day as $event) {
					$this->insert('partials/events/list', ['event' => $event]);
				}
				?>
			</ul>
		</div>
		<?php endforeach ?>
	</div>
	<div class="page-timeline">
		<a class="twitter-timeline"  href="https://twitter.com/hashtag/rutaEnMarea" data-chrome="noheader nofooter noborders" data-widget-id="769118986873233408">#rutaEnMarea Tweets</a>
        
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>
</div>