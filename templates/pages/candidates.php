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
$provinces = [
	'acoruna' => [
		'title' => 'A Coruña',
		'slice' => [8, 17],
		'candidates' => []
	],
	'lugo' => [
		'title' => 'Lugo',
		'slice' => [4, 10],
		'candidates' => []
	],
	'pontevedra' => [
		'title' => 'Pontevedra',
		'slice' => [8, 14],
		'candidates' => []
	],
	'ourense' => [
		'title' => 'Ourense',
		'slice' => [4, 10],
		'candidates' => []
	],
];

foreach ($candidates as $candidate) {
	$provinces[$candidate->province]['candidates'][] = $candidate;
}
?>

<?php $this->start('extra-head') ?>
<link rel="stylesheet" type="text/css" href="<?= $this->asset('css/pages/candidates.css') ?>">

<style type="text/css">
	<?php foreach (array_keys($provinces) as $id): ?>
	#<?= $id ?> .page-province-header {
		background-image: url('<?= $this->img('img/candidatura/'.$id.'.jpg', 'landscape.') ?>');
	}
	@media (max-width: 700px) {
		#<?= $id ?> .page-province-header {
			background-image: url('<?= $this->img('img/candidatura/'.$id.'.jpg', 'normal.') ?>');
		}
	}
	@media (min-width: 1400px) {
		#<?= $id ?> .page-province-header {
			background-image: url('<?= $this->img('img/candidatura/'.$id.'.jpg', 'biglandscape.') ?>');
		}
	}
	<?php endforeach ?>
</style>
<?php $this->stop(); ?>

<header class="page-header">
	<h1>Candidaturas</h1>
	<p>Listas para o cambio</p>
</header>

<div class="js-tabs">
	<nav class="page-navigation">
		<a href="#acoruna">A Coruña</a>
		<a href="#lugo">Lugo</a>
		<a href="#ourense">Ourense</a>
		<a href="#pontevedra">Pontevedra</a>
	</nav>

	<?php foreach ($provinces as $key => $province): ?>
	<section class="page-province" id="<?= $key ?>">
		<div class="page-province-header">
			<h2><?= $province['title'] ?></h2>
		</div>

		<div class="page-province-content">
		    <ol class="page-candidates-main">
				<?php foreach (array_slice($province['candidates'], 0, $province['slice'][0]) as $candidate): ?>
		        <li>
		            <img src="<?= $this->img('uploads/candidates/imageFile/'.$candidate->imageFile->getFilename(), 'cand-small.') ?>">
		            <strong>
		                <?= $candidate->name ?>
		            </strong>
		        </li>
		        <?php endforeach ?>
		    </ol>

			<ol class="page-candidates-secondary">
				<?php foreach (array_slice($province['candidates'], $province['slice'][0], $province['slice'][1]) as $candidate): ?>
				<li>
					<strong>
						<?= $candidate->name ?>
					</strong>
				</li>
				<?php endforeach ?>
			</ol>

			<h3>Suplentes:</h3>

			<ol class="page-substitutes">
				<?php foreach (array_slice($province['candidates'], $province['slice'][1]) as $candidate): ?>
				<li>
					<?= $candidate->name ?>
				</li>
				<?php endforeach ?>
			</ol>
		</div>
	</section>
	<?php endforeach ?>
</div>