<?php 

$social = new SocialLinks\Page([
    'url' => $this->url('program'),
    'title' => $block->title.' - En Marea',
    'text' => $block->text,
    'image' => $this->asset('img/img-rrss.png'),
    'twitterUser' => '@en_marea',
]);
?>

<?= $this->layout('layouts/default', ['social' => $social]) ?>

<?php $this->start('extra-head') ?>
<link rel="stylesheet" type="text/css" href="<?= $this->asset('css/pages/program-block.css') ?>">
<?php $this->stop(); ?>

<div class="page-header-container">
	<header>
		<h1>
			<a href="<?= $this->url('program') ?>">
				Programa
			</a>
		</h1>
	</header>

	<nav class="page-navigation-main">
		<?php foreach ($blocks as $val): ?>
		<a href="<?= $this->url('program-block', ['block' => $val->slug]) ?>"<?= $val->id === $block->id ? ' class="is-active"' : '' ?>>
			<?= $val->title ?>
		</a>
		<?php endforeach ?>
	</nav>
</div>

<article class="page-content program-block is-permalink">
	<h1 class="program-block-title">
		<?= $block->title ?>
	</h1>

	<div class="program-block-text">
		<?= $block->text ?>
	</div>

	<nav class="page-chapters">
		<ul class="program-chaptersList">
			<?php foreach ($chapters as $chapter): ?>
			<li class="program-chapter is-list">
				<a href="<?= $this->url('program-chapter', ['block' => $block->slug, 'chapter' => $chapter->slug]) ?>">
					<?= $chapter->title ?>
				</a>
			</li>
			<?php endforeach ?>
		</ul>
	</nav>
</div>