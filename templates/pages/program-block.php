<?php 

$social = new SocialLinks\Page([
    'url' => $this->url('program-block', ['block' => $block->slug]),
    'title' => $block->title,
    'text' => $block->text,
    'image' => $this->asset('img/programa/'.$block->icon.'.png'),
    'twitterUser' => '@en_marea',
]);
?>

<?= $this->layout('layouts/default', ['social' => $social, 'menu' => 'program']) ?>

<?php $this->start('extra-head') ?>
<link rel="stylesheet" type="text/css" href="<?= $this->asset('css/pages/program-block.css') ?>">
<?php $this->stop(); ?>

<?php $this->insert('partials/program-header', ['blocks' => $blocks, 'block' => $block]) ?>

<article class="page-content program-block is-permalink">
	<h1 class="program-block-title">
		<?= $block->title ?>
	</h1>

	<?php $this->insert('partials/share', ['social' => $social]) ?>

	<div class="program-block-text">
		<?= $this->svg($block->icon.'-img')->withA11y($block->title) ?>
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