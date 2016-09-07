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

	<h1>
		<a href="<?= $this->url('program-block', ['block' => $block->slug]) ?>">
			<?= $block->title ?>
		</a>
	</h1>
	<h2>
		<?= $chapter->title ?>
	</h2>

	<?= $chapter->text ?>

	<ul>
		<?php foreach ($actions as $action): ?>
		<li>
			<h3><?= $action->title ?></h3>
			<?= $action->text ?>
		</li>
		<?php endforeach ?>
	</ul>
</div>