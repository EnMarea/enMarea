<?php 

use Jenssegers\Date\Date;

$social = new SocialLinks\Page([
	'url' => $this->url('home'),
	'title' => $text->title.' - En Marea',
	'text' => empty($text->intro) ? 'En Marea, a alternativa de cambio en Galicia. Coñece a Luís Villares, o futuro presidente da Xunta' : $text->intro,
	'image' => $this->asset('img/img-rrss.png'),
	'twitterUser' => '@en_marea',
]);
?>

<?= $this->layout('layouts/default', ['social' => $social]) ?>

<?php $this->start('extra-head') ?>
<link rel="stylesheet" type="text/css" href="<?= $this->asset('css/pages/text.css') ?>">
<?php $this->stop(); ?>

<?php if ($menu->count() && $subText): ?>
<nav class="page-navigation">
	<ul>
		<li>
			<a href="<?= $this->url('about') ?>">
				Volver
			</a>
		</li>
	</ul>
</nav>
<?php endif ?>

<article class="text is-permalink page-content" data-folk="texts,<?= $text->id ?>">
	<header class="text-header">
		<h1 class="text-title"><?= $text->title ?></h1>
	</header>

	<?php if (!empty($text->intro)): ?>
	<div class="text-intro">
		<?= $text->intro ?>
	</div>
	<?php endif ?>

	<div class="text-body">
		<?php
		foreach ($text->body as $section) {
			$this->insert('partials/sections/'.$section['type'], ['section' => $section, 'context' => 'texts']);
		}
		?>
	</div>

	<?php if ($menu->count()): ?>
	<nav class="text-navigation">
		<ul>
			<?php if ($subText): ?>
			<li>
				<a href="<?= $this->url('about') ?>" class="is-back">
					Volver
				</a>
			</li>
			<?php endif ?>
			<?php foreach ($menu as $option): ?>
			<li>
				<a href="<?= $this->url('about', ['slug' => $option->name]) ?>"<?= $option->name === $text->name ? ' class="is-selected"' : '' ?>>
					<?= $option->title ?>
				</a>
			</li>
			<?php endforeach ?>
		</ul>
	</nav>
	<?php endif ?>
</article>
