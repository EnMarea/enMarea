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
					<li><a href="#">O meu blog</a></li>
					<li><a href="#">Transparencia</a></li>
					<li class="is-extended">
						<strong>Hoxe estaremos en:</strong>
						
						<ul class="eventList">
							<?php $this->insert('partials/events/minilist') ?>
							<?php $this->insert('partials/events/minilist') ?>
						</ul>
						<a href="#">Ver toda a axenda</a>
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

	<ul class="page-highlights-filters">
		<li><a class="is-actived" href="#">Movémonos</a></li>
		<li><a href="#">A Coruña</a></li>
		<li><a href="#">Lugo</a></li>
		<li><a href="#">Ourense</a></li>
		<li><a href="#">Pontevedra</a></li>
	</ul>
</div>

<section class="page-highlights">
	<ul class="page-highlights-content">
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
