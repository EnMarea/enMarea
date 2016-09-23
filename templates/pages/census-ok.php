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
    <div class="page-message-ok">
        <h2>Datos gardados correctamente</h2>

        <p>Moitas grazas por asinares os nosos principios. A partir dagora recibirás no teu email as novidades, aínda que podes desuscribirte en calquera momento</p>
    </div>
</div>
