<?php 
$social = new SocialLinks\Page([
    'url' => $this->url('news'),
    'title' => 'Actualidade',
    'text' => 'En Marea, a alternativa de cambio en Galicia. Coñece a Luís Villares, o futuro presidente da Xunta',
    'image' => $this->asset('img/img-rrss.png'),
    'twitterUser' => '@en_marea',
]);
?>

<?= $this->layout('layouts/default', ['social' => $social]) ?>

<?php $this->start('extra-head') ?>
<link rel="stylesheet" type="text/css" href="<?= $this->asset('css/pages/census.css') ?>">
<?php $this->stop(); ?>

<div class="page-header">
	<header>
		<h1>Censo</h1>
		<p>Cada día somos máis</p>
	</header>
</div>

<div class="page-content">
    <?= $form ?>
</div>