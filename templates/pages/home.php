<?= $this->layout('layouts/default') ?>

<?php $this->start('extra-head') ?>
<link rel="stylesheet" type="text/css" href="<?= $this->asset('css/pages/home.css') ?>">
<style type="text/css">
	.hero {
		background-image: url('uploads/hero/bgImageFile/cabeceira.jpg');
	}
</style>
<?php $this->stop(); ?>

<div class="hero">
	<section class="hero-content">
		<header>
			<h1>Luís</h1>
		</header>

		<blockquote class="hero-quote">
			<span>"Cando hai, hai que repartir, e cando non hai, hai que repartir mellor"</span>
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

<section class="page-highlights">
	
	<ul>
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
