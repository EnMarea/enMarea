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

<article class="text page-content" data-folk="texts,<?= $text->id ?>">
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
</article>
