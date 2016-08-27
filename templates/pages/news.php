<?php 
$social = new SocialLinks\Page([
	'url' => $this->url('news'),
	'title' => 'Actualidade - En Marea',
	'image' => $this->asset('img/logo-rrss.png'),
	'twitterUser' => '@en_marea',
]);
?>

<?= $this->layout('layouts/default', ['menu' => 'news', 'social' => $social]) ?>

<?php $this->start('extra-head') ?>
<link rel="stylesheet" type="text/css" href="<?= $this->asset('css/pages/news.css') ?>">
<link rel="alternate" type="application/rss+xml" title="RSS" href="<?= $this->url('news-rss') ?>">
<?php $this->stop(); ?>

<header class="page-header">
	<h1>Actualidade</h1>
	<p>O cambio día a día</p>
</header>

<ul class="newList">
	<?php
	foreach ($news as $new) {
		$this->insert('partials/news/list', ['new' => $new]);
	}
	?>
</ul>
