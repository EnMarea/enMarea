<?php

$social = new SocialLinks\Page([
    'url' => $this->url('candidates'),
    'title' => 'Listas para o cambio - En marea',
    'text' => 'En Marea, a alternativa de cambio en Galicia. Coñece a Luís Villares, o futuro presidente da Xunta',
    'image' => $this->asset('img/img-rrss.png'),
    'twitterUser' => '@en_marea',
]);

$this->layout('layouts/default', ['menu' => 'candidates', 'social' => $social]);

//Ordernar candidatos
$provinces = [];

foreach ($candidates as $candidate) {
	if (!isset($provinces[$candidate->province])) {
		$provinces[$candidate->province] = [];
	}

	$provinces[$candidate->province][] = $candidate;
}
?>

<?php $this->start('extra-head') ?>
<link rel="stylesheet" type="text/css" href="<?= $this->asset('css/pages/candidates.css') ?>">

<style type="text/css">
	.page-header-container {
		background-image: url('<?= $this->img('img/candidatura/acoruna.jpg', 'landscape.') ?>');
	}
	@media (max-width: 700px) {
		.page-header-container {
			background-image: url('<?= $this->img('img/candidatura/acoruna.jpg', 'normal.') ?>');
		}
	}
	@media (min-width: 1400px) {
		.page-header-container {
			background-image: url('<?= $this->img('img/candidatura/acoruna.jpg', 'biglandscape.') ?>');
		}
	}
</style>
<?php $this->stop(); ?>

<div class="page-content">
	<header class="page-header">
		<h1>Candidaturas</h1>
		<p>Listas para o cambio</p>
	</header>

	<nav class="page-navigation">
		<a href="<?= $this->url('news') ?>" class="is-actived">A Coruña</a>
		<a href="<?= $this->url('news') ?>">Lugo</a>
		<a href="<?= $this->url('news') ?>">Ourense</a>
		<a href="<?= $this->url('news') ?>">Pontevedra</a>
	</nav>

	<div class="page-header-container">
		<h2>A Coruña</h2>
	</div>

	<section class="page-province">

        <ol class="page-candidates-main">
			<?php foreach (array_slice($provinces['acoruna'], 0, 8) as $candidate): ?>
            <li>
                <img src="<?= $this->img('uploads/candidates/imageFile/'.$candidate->imageFile->getFilename(), 'cand-small.') ?>">
                <strong>
                    <?= $candidate->name ?>
                </strong>
            </li>
            <?php endforeach ?>
        </ol>
        
		<ol class="page-candidates-secondary">
			<?php foreach (array_slice($provinces['acoruna'], 8, 17) as $candidate): ?>
			<li>
				<strong>
					<?= $candidate->name ?>
				</strong>
			</li>
			<?php endforeach ?>
		</ol>

		<h3>Suplentes:</h3>

		<ol class="page-substitutes">
			<?php foreach (array_slice($provinces['acoruna'], 17) as $candidate): ?>
			<li>
				<?= $candidate->name ?>
			</li>
			<?php endforeach ?>
		</ol>
	</section>
</div>