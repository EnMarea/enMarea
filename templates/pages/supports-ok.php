<?php 
$social = new SocialLinks\Page([
    'url' => $this->url('supports'),
    'title' => $text->title,
    'text' => $text->intro,
    'image' => $this->asset('img/img-rrss.png'),
    'twitterUser' => '@en_marea',
]);
?>

<?= $this->layout('layouts/default', ['social' => $social]) ?>

<?php $this->start('extra-head') ?>
<link rel="stylesheet" type="text/css" href="<?= $this->asset('css/pages/supports.css') ?>">
<?php $this->stop(); ?>

<div class="page-header">
	<header>
		<h1><?= $text->title ?></h1>
        <?= $text->intro ?>
	</header>
</div>

<div class="page-content">
    <div class="page-message-ok">
        <h2>Datos gardados correctamente</h2>

        <p>Moitas grazas por asinares o manifesto de apoio a Luís Villares. A partir dagora sairás na lista de asinantes</p>

        <a href="<?= $this->url('supports') ?>" class="button">
            Ver lista de asinantes
        </a>
    </div>
</div>
