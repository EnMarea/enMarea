<?php 
$showTitle = !$highlight->isEmbed || strpos($highlight->url, 'twitter') === false;
?>
<li class="highlight is-list<?= empty($highlight->province) ? '' : ' is-'.$highlight->province ?>" data-folk="highlights,<?= $highlight->id ?>">

	<?php if ($highlight->isEmbed): ?>
		<div class="highlight-embed<?= $showTitle ? ' is-responsive' : ''; ?>">
			<?= $highlight->code ?>
		</div>
	<?php else: ?>
	<a href="<?= $highlight->url ?>" class="highlight-image">
		<img src="<?= $this->img('uploads/highlights/imageFile/'.$highlight->imageFile->getFilename(), 'small.') ?>">

		<p class="highlight-details">
			<?php if (!empty($highlight->type)): ?>
			<strong class="highlight-type"><?= $highlight->type ?></strong>
			<?php endif ?>
		</p>
	</a>
	<?php endif ?>

	<?php if ($showTitle): ?>
	<a href="<?= $highlight->url ?>">
		<h2 class="highlight-title"><?= $highlight->title ?></h2>
	</a>
	<?php endif ?>
</li>