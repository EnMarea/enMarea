<?php 
$social = new SocialLinks\Page([
	'url' => $this->url('home'),
	'title' => 'En Marea',
]);
?>

<?= $this->layout('layouts/default', ['social' => $social]) ?>

<?php $this->start('extra-head') ?>
<link rel="stylesheet" type="text/css" href="<?= $this->asset('css/pages/home.css') ?>">
<style type="text/css">
	.hero {
		background-image: url('<?= $this->img('uploads/headers/imageFile/'.$header->imageFile->getFilename(), 'landscape.') ?>');
	}
</style>
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
				<span><?= $header->text ?></span>
			</blockquote>

			<nav>
				<ul class="hero-menu">
					<li><a href="#">Coñéceme</a></li>
					<?php /*
					<li><a href="#">O meu blog</a></li>
					<li><a href="#">Transparencia</a></li>
					*/ ?>
					<li class="is-extended">
						<strong>Hoxe estaremos en:</strong>
						
						<ul class="eventList">
							<?php
							foreach ($events as $event) {
								$this->insert('partials/events/minilist', ['event' => $event]);
							}
							?>
						</ul>
						<a href="<?= $this->url('events') ?>">Ver toda a axenda</a>
					</li>
				</ul>
			</nav>

			<footer class="hero-social">
				<strong>Vémonos nas redes</strong>
				<a href="#">@VillaresLuis</a>
				<a href="#">luis.luisino.7</a>
			</footer>
		</section>
	</div>

	<ul class="page-highlights-filters js-filter" data-target="#highlights">
		<li data-filter="*" class="is-actived">Movémonos</li>
		<li data-filter=".is-acoruna">A Coruña</li>
		<li data-filter=".is-lugo">Lugo</li>
		<li data-filter=".is-ourense">Ourense</li>
		<li data-filter=".is-pontevedra">Pontevedra</li>
	</ul>
</div>

<section class="page-highlights">
	<ul class="page-highlights-content" id="highlights">
		<?php
		foreach ($highlights as $highlight) {
			$this->insert('partials/highlights/list', ['highlight' => $highlight]);
			$this->insert('partials/highlights/list', ['highlight' => $highlight]);
			$this->insert('partials/highlights/list', ['highlight' => $highlight]);
			$this->insert('partials/highlights/list', ['highlight' => $highlight]);
			$this->insert('partials/highlights/list', ['highlight' => $highlight]);
			$this->insert('partials/highlights/list', ['highlight' => $highlight]);
			$this->insert('partials/highlights/list', ['highlight' => $highlight]);
			$this->insert('partials/highlights/list', ['highlight' => $highlight]);
			$this->insert('partials/highlights/list', ['highlight' => $highlight]);
			$this->insert('partials/highlights/list', ['highlight' => $highlight]);
			$this->insert('partials/highlights/list', ['highlight' => $highlight]);
			$this->insert('partials/highlights/list', ['highlight' => $highlight]);
		}
		?>
	</ul>
</section>
