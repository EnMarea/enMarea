<?php 
$social = new SocialLinks\Page([
	'url' => $this->url('news'),
	'title' => 'En Marea - Actualidade',
]);
?>

<?= $this->layout('layouts/default', ['menu' => 'news', 'social' => $social]) ?>

<?php $this->start('extra-head') ?>
<link rel="stylesheet" type="text/css" href="<?= $this->asset('css/pages/news.css') ?>">
<?php $this->stop(); ?>

<header class="page-header">
	<h1>Actualidade</h1>
	<p>O cambio día a día</p>
</header>

<ul class="newList">
	<?php
	foreach ($news as $new) {
		$this->insert('partials/news/list', ['new' => $new]);
		$this->insert('partials/news/list', ['new' => $new]);
		$this->insert('partials/news/list', ['new' => $new]);
		$this->insert('partials/news/list', ['new' => $new]);
		$this->insert('partials/news/list', ['new' => $new]);
	}
	?>
</ul>
