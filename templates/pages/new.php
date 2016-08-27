<?php 

use Jenssegers\Date\Date;

$social = new SocialLinks\Page([
	'url' => $this->url('new', ['slug' => $new->slug]),
	'title' => $new->title.' - En Marea',
	'text' => $new->intro,
	'image' => $this->img('uploads/news/imageFile/'.$new->imageFile->getFilename(), 'small.'),
	'twitterUser' => '@en_marea'
]);
?>

<?= $this->layout('layouts/default', ['menu' => 'news', 'social' => $social]) ?>

<?php $this->start('extra-head') ?>
<link rel="stylesheet" type="text/css" href="<?= $this->asset('css/pages/new.css') ?>">
<?php $this->stop(); ?>

<div class="page-content">
	<nav class="page-navigation">
		<a href="<?= $this->url('news') ?>">Volver á actualidade</a>
	</nav>

	<article class="new is-permalink">
		<header class="new-header">
			<?php $date = Date::instance($new->createdAt); ?>
			<time class="new-time" title="<?= $date->format('l j F') ?>">
				<?= $date->diffForHumans() ?>
			</time>

			<h1 class="new-title"><?= $new->title ?></h1>
			
			<div class="new-intro">
				<?= $new->intro ?>
			</div>

			<?php $this->insert('partials/share', ['social' => $social]) ?>
		</header>

		<figure class="new-image">
			<img src="<?= $this->img('uploads/news/imageFile/'.$new->imageFile->getFilename(), 'landscape.') ?>">
		</figure>

		<div class="new-body">
			<?php
			foreach ($new->body as $section) {
				$this->insert('partials/sections/'.$section['type'], ['section' => $section]);
			}
			?>
		</div>
	</article>

	<nav class="page-navigation">
		<a href="<?= $this->url('news') ?>">Volver á actualidade</a>
	</nav>

	<aside class="page-morenews">
		<ul class="newList">
			<?php
			foreach ($latests as $latest) {
				$this->insert('partials/news/list', ['new' => $latest]);
			}
			?>
		</ul>
	</aside>
</div>
