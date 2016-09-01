<?php

$social = new SocialLinks\Page([
    'url' => $this->url('candidates'),
    'title' => 'Listas para o cambio - En marea',
    'text' => 'En Marea, a alternativa de cambio en Galicia. Coñece a Luís Villares, o futuro presidente da Xunta',
    'image' => $this->asset('img/img-rrss.png'),
    'twitterUser' => '@en_marea',
]);

$this->layout('layouts/default', ['menu' => 'candidates', 'social' => $social]);
?>

<?php $this->start('extra-head') ?>
<link rel="stylesheet" type="text/css" href="<?= $this->asset('css/pages/candidates.css') ?>">
<?php $this->stop(); ?>

<div class="page-header-container">
	<header class="page-header">
		<h1><?= $texts['candidatos']->header->title ?></h1>
		<p><?= $texts['candidatos']->header->subtitle ?></p>
	</header>
</div>

<div class="page-content">
	<?php foreach ($texts['candidatos']->provinces as $province): ?>
	<section class="page-province">
		<h2><?= $province->title ?></h2>

		<?php /*
        <ol class="page-candidates-main">
            <?php foreach ($province->main_candidates as $candidate): ?>
            <li>
                <img src="//placehold.it/92x92">
                <strong>
                    <?= $candidate->name ?>
                </strong>
            </li>
            <?php endforeach ?>
        </ol>
        */ ?>
		<ol class="page-candidates-secondary">
			<?php foreach ($province->main_candidates as $candidate): ?>
			<li>
				<strong>
					<?= $candidate->name ?>
				</strong>
			</li>
			<?php endforeach ?>

			<?php foreach ($province->secondary_candidates as $candidate): ?>
			<li>
				<strong>
					<?= $candidate->name ?>
				</strong>
			</li>
			<?php endforeach ?>
		</ol>
		<h3>Suplentes:</h3>
		<ol class="page-substitutes">
			<?php foreach ($province->substitutes as $substitute): ?>
			<li>
				<?= $substitute->name ?>
			</li>
			<?php endforeach ?>
		</ol>
	</section>
	<?php endforeach ?>
</div>