<?php 

$social = new SocialLinks\Page([
    'url' => $this->url('program-action', ['number' => $action->number]),
    'title' => $action->title,
    'text' => $action->text,
    'image' => $this->asset('img/img-rrss.png'),
    'twitterUser' => '@en_marea',
]);
?>

<?= $this->layout('layouts/default', ['social' => $social]) ?>

<?php $this->start('extra-head') ?>
<link rel="stylesheet" type="text/css" href="<?= $this->asset('css/pages/program-action.css') ?>">
<?php $this->stop(); ?>

<?php $this->insert('partials/program-header', ['blocks' => $blocks, 'block' => $action->programChapter->programBlock]) ?>

<div class="page-content">
	<nav class="page-navigation-secondary">
		<a href="<?= $this->url('program-chapter', ['block' => $action->programChapter->programBlock->slug, 'chapter' => $action->programChapter->slug]) ?>">
			<?= $action->programChapter->title ?>
		</a>
	</nav>

	<article class="program-action is-permalink">
		<h1 class="program-action-title">
			<strong>
				<?= $action->number ?>
			</strong>
			<?= $action->title ?>
		</h1>

		<div class="program-action-text">
			<?= $action->text ?>
		</div>

		<?php $this->insert('partials/share', ['social' => $social]) ?>
	</article>
</div>