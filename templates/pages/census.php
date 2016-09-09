<?php 
$social = new SocialLinks\Page([
    'url' => $this->url('news'),
    'title' => 'Actualidade',
    'text' => 'En Marea, a alternativa de cambio en Galicia. Coñece a Luís Villares, o futuro presidente da Xunta',
    'image' => $this->asset('img/img-rrss.png'),
    'twitterUser' => '@en_marea',
]);
?>

<?= $this->layout('layouts/default', ['menu' => 'news', 'social' => $social]) ?>

<?php $this->start('extra-head') ?>
<link rel="stylesheet" type="text/css" href="<?= $this->asset('css/pages/news.css') ?>">
<link rel="alternate" type="application/rss+xml" title="RSS" href="<?= $this->url('news-rss') ?>">
<?php $this->stop(); ?>

<div>
    <?= $form ?>
</div>