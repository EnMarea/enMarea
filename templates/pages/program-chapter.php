<?php 

$social = new SocialLinks\Page([
    'url' => $this->url('program'),
    'title' => $chapter->title.' - '.$block->title.' - En Marea',
    'text' => $chapter->text,
    'image' => $this->asset('img/img-rrss.png'),
    'twitterUser' => '@en_marea',
]);
?>

<?= $this->layout('layouts/default', ['social' => $social]) ?>

<?php $this->start('extra-head') ?>
<link rel="stylesheet" type="text/css" href="<?= $this->asset('css/pages/program-chapter.css') ?>">
<?php $this->stop(); ?>

<div class="page-header-container">
	<header>
		<h1>Programa</h1>
	</header>

	<nav class="page-navigation-main">
		<?php foreach ($blocks as $val): ?>
		<a href="<?= $this->url('program-block', ['block' => $val->slug]) ?>"<?= $val->id === $block->id ? ' class="is-active"' : '' ?>>
			<?= $val->title ?>
		</a>
		<?php endforeach ?>
	</nav>
</div>

<div class="page-content">
	<nav class="page-navigation-secondary">
		<a href="<?= $this->url('program-block', ['block' => $block->slug]) ?>">Volver atrás</a>
	</nav>

	<article class="program-chapter is-permalink">
		<h1 class="program-chapter-title">
			<?= $chapter->title ?>
		</h1>

		<div class="program-chapter-text">
			<?= $chapter->text ?>
		</div>

		<?php foreach ($actions as $action): ?>
		<section class="program-action is-list">
			<h2 class="program-action-title js-toggle">
				<strong><?= $action->number ?></strong> <?= $action->title ?>
			</h2>

			<div class="program-action-text">
				<?= $action->text ?>
			</div>
		</section>
		<?php endforeach ?>
	</article>
</div>