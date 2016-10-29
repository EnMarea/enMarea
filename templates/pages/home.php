<?php 
$social = new SocialLinks\Page([
    'url' => $this->url('home'),
    'title' => 'A alternativa de cambio en Galicia',
    'text' => 'En Marea, a alternativa de cambio en Galicia. Coñece a Luís Villares, o futuro presidente da Xunta',
    'image' => $this->asset('img/img-rrss.png'),
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
		background-position: <?= $header->positionX ?>% 15%;
	}
	@media (max-width: 700px) {
		.hero {
			background-image: linear-gradient(rgba(0, 30, 100, .6), rgba(0, 30, 100, .6)), url('<?= $this->img('uploads/headers/imageFile/'.$header->imageFile->getFilename(), 'smalllandscape.') ?>');
			background-position: center center;
		}
	}
	@media (min-width: 1400px) {
		.hero {
			background-image: url('<?= $this->img('uploads/headers/imageFile/'.$header->imageFile->getFilename(), 'biglandscape.') ?>');
			background-position: <?= $header->positionX ?>% 35%;
		}
	}
</style>
<?php endif ?>
<?php $this->stop(); ?>

<div class="hero is-<?= $header->style ?>">
	<div class="hero-container">
		<section class="hero-content">
			<blockquote class="hero-quote">
				<?php if (empty($header->url)): ?>
					<q><?= $header->text ?></q>
				<?php else: ?>
					<a href="<?= $header->url ?>">
						<q><?= $header->text ?></q>
					</a>
				<?php endif ?>
			</blockquote>
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
