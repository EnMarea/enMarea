<?php

$social = new SocialLinks\Page([
	'url' => $this->url('candidates'),
	'title' => 'Candidatos - En marea',
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

		<ol>
			<?php foreach ($province->candidates as $candidate): ?>
			<li>
				<?= $candidate->name ?>
			</li>
			<?php endforeach ?>
		</ol>
	</section>
	<?php endforeach ?>
</div>