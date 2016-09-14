<?php 
$social = new SocialLinks\Page([
    'url' => $this->url('program-chapter', ['block' => $block->slug, 'chapter' => $chapter->slug]),
    'title' => $chapter->title.' - '.$block->title,
    'text' => $chapter->text,
    'image' => $this->asset('img/programa/'.$block->icon.'.png'),
    'twitterUser' => '@en_marea',
]);
?>

<?= $this->layout('layouts/default', ['social' => $social, 'menu' => 'program']) ?>

<?php $this->start('extra-head') ?>
<link rel="stylesheet" type="text/css" href="<?= $this->asset('css/pages/program-chapter.css') ?>">
<?php $this->stop(); ?>

<?php $this->insert('partials/program-header', ['blocks' => $blocks, 'block' => $block]) ?>

<div class="page-content">
	<nav class="page-navigation-secondary">
		<a href="<?= $this->url('program-block', ['block' => $block->slug]) ?>">Volver atrás</a>
	</nav>

	<article class="program-chapter is-permalink">
		<h1 class="program-chapter-title">
			<?= $chapter->title ?>
		</h1>

		<?php $this->insert('partials/share', ['social' => $social]) ?>

		<div class="program-chapter-text">
			<?= $chapter->text ?>
		</div>

		<?php foreach ($actions as $action): ?>
		<section class="program-action is-list" id="medida-<?= $action->number ?>">
			<a href="<?= $this->url('program-action', ['number' => $action->number]) ?>" class="program-action-title js-toggle" data-id="medida-<?= $action->number ?>">
				<strong><?= $action->number ?></strong> <?= $action->title ?>
			</a>

			<div class="program-action-text">
				<?= $action->text ?>

				<?php $this->insert('partials/share', ['social' => new SocialLinks\Page([
					    'url' => $this->url('program-action', ['number' => $action->number]),
					    'title' => $action->title,
					    'text' => $action->text,
					    'twitterUser' => '@en_marea',
					])]) ?>
			</div>
		</section>
		<?php endforeach ?>
	</article>
</div>