<?php 
$social = new SocialLinks\Page([
	'url' => $this->url('home'),
	'title' => 'En Marea',
	'image' => $this->asset('img/logo-rrss.png'),
	'twitterUser' => '@en_marea',
]);
?>

<?= $this->layout('layouts/default', ['social' => $social]) ?>

<?php $this->start('extra-head') ?>
<link rel="stylesheet" type="text/css" href="<?= $this->asset('css/pages/home.css') ?>">
<?php if (!empty($header->imageFile)): ?>
<style type="text/css">
	.hero {
		background-image: url('<?= $this->img('uploads/headers/imageFile/'.$header->imageFile->getFilename(), 'landscape.') ?>');
	}
	@media (max-width: 700px) {
		.hero {
			background-image: linear-gradient(rgba(0, 30, 100, .6), rgba(0, 30, 100, .6)), url('<?= $this->img('uploads/headers/imageFile/'.$header->imageFile->getFilename(), 'normal.') ?>');
			background-position: center center;
		}
	}
</style>
<?php endif ?>
<?php $this->stop(); ?>

<div class="hero is-<?= $header->style ?>">
	<div class="hero-container">
		<section class="hero-content">
			<header>
				<h1 class="hero-title">
					<?= $this->svg('logo-luisvillares')->withA11y('Luís Villares') ?>
				</h1>
			</header>

			<blockquote class="hero-quote">
				<q><?= $header->text ?></q>
			</blockquote>

			<nav>
				<ul class="hero-menu">
					<li>
						<a href="<?= $this->url('bio') ?>">
							Coñéceme
						</a>
					</li>
					<?php /*
					<li><a href="#">O meu blog</a></li>
					<li><a href="#">Transparencia</a></li>
					*/ ?>
					<?php if ($events->count()): ?>
					<li class="is-extended">
						<strong>Hoxe estaremos en:</strong>
						
						<ul class="eventList">
							<?php
							foreach ($events as $event) {
								$this->insert('partials/events/minilist', ['event' => $event]);
							}
							?>
						</ul>
						<a href="<?= $this->url('events') ?>">Ver axenda completa</a>
					</li>
					<?php else: ?>
					<li>
						<a href="<?= $this->url('events') ?>">
							Axenda de campaña
						</a>
					</li>
					<?php endif ?>
				</ul>
			</nav>

			<footer class="hero-social">
				<strong>Vémonos nas redes</strong>
				<a href="https://twitter.com/VillaresLuis">
					<?= $this->svg('ico-twitter') ?>
					@VillaresLuis
				</a>
				<a href="https://www.facebook.com/LuisVillaresNaveira/">
					<?= $this->svg('ico-facebook') ?>
					LuisVillaresNaveira
				</a>
			</footer>
		</section>
	</div>

	<?php
	/* Eliminaos os filtros mentres non haxa suficiente contido

	<ul class="page-highlights-filters js-filter" data-target="#highlights">
		<li data-filter="*" class="is-actived">Movémonos</li>
		<li data-filter=".is-acoruna">A Coruña</li>
		<li data-filter=".is-lugo">Lugo</li>
		<li data-filter=".is-ourense">Ourense</li>
		<li data-filter=".is-pontevedra">Pontevedra</li>
	</ul>
	*/ ?>
</div>

<section class="page-highlights">
	<ul class="page-highlights-content" id="highlights">
		<?php
		foreach ($highlights as $highlight) {
			$this->insert('partials/highlights/list', ['highlight' => $highlight]);
		}
		?>
	</ul>
</section>
