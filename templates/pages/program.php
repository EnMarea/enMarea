<?php 

$social = new SocialLinks\Page([
    'url' => $this->url('program'),
    'title' => 'Programa 2016',
    'text' => 'En Marea, a alternativa de cambio en Galicia. Coñece a Luís Villares, o futuro presidente da Xunta',
    'image' => $this->asset('img/img-rrss.png'),
    'twitterUser' => '@en_marea',
]);
?>

<?= $this->layout('layouts/default', ['social' => $social]) ?>

<?php $this->start('extra-head') ?>
<link rel="stylesheet" type="text/css" href="<?= $this->asset('css/pages/program.css') ?>">
<?php $this->stop(); ?>

<div class="page-header-container">
	<header>
		<h1><?= $text->title ?></h1>
	</header>

	<div class="page-intro">
		<?= $text->intro ?>
	</div>
</div>

<div class="page-content">
	<ul class="page-blocks">
		<?php foreach ($blocks as $block): ?>
		<li>
			<a href="<?= $this->url('program-block', ['block' => $block->slug]) ?>">
				<?= $this->svg($block->icon)->withA11y($block->title) ?>
				<?= $block->title ?>
			</a>
		</li>
		<?php endforeach ?>
	</ul>

	<?php $download = null; ?>
	<div class="page-text">
		<?php foreach ($text->body as $section): ?>
		<?php
		if ($section['type'] === 'file') {
			$download = $section;
			continue;
		}
		?>
		<section>
			<?= $section['html'] ?>
		</section>
		<?php endforeach ?>
	</div>

	<footer class="page-footer">
		<a href="<?= $this->asset('uploads/texts/file/'.$download['file']) ?>" class="button">
			<?= $download['title'] ?>
		</a>
	</footer>
</div>