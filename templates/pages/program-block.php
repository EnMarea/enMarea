<?php 

$social = new SocialLinks\Page([
    'url' => $this->url('program'),
    'title' => 'Programa - En Marea',
    'text' => 'En Marea, a alternativa de cambio en Galicia. Coñece a Luís Villares, o futuro presidente da Xunta',
    'image' => $this->asset('img/img-rrss.png'),
    'twitterUser' => '@en_marea',
]);
?>

<?= $this->layout('layouts/default', ['social' => $social]) ?>

<?php $this->start('extra-head') ?>
<link rel="stylesheet" type="text/css" href="<?= $this->asset('css/pages/program.css') ?>">
<?php $this->stop(); ?>

<div>
	<a href="<?= $this->url('program') ?>">Programa</a>
	<h1><?= $block->title ?></h1>
	<?= $block->text ?>

	<ul>
		<?php foreach ($chapters as $chapter): ?>
		<li>
			<a href="<?= $this->url('program-chapter', ['block' => $block->slug, 'chapter' => $chapter->slug]) ?>">
				<?= $chapter->title ?>
			</a>
		</li>
		<?php endforeach ?>
	</ul>
</div>