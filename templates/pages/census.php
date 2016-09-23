<?php 
$social = new SocialLinks\Page([
    'url' => $this->url('census'),
    'title' => 'Asina os nosos principios básicos',
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
		<h1>Asina os nosos principios básicos</h1>
		<p>Xa somos <?= $total ?> asinantes</p>
	</header>
</div>

<div class="page-content">
    <?= $form ?>

    <p class="page-legal">
        De acordo co artigo 5 da Lei Orgánica 15/1999, de protección de datos de carácter persoal, informamos que os datos facilitados serán incorporados e tratados nun ficheiro titularidade de EN MAREA para o seu uso exclusivo no eido desta iniciativa.
    </p>
</div>
