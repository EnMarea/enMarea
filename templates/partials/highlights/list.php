<li class="highlight is-list<?= empty($highlight->province) ? '' : ' is-'.$highlight->province ?>" data-folk="highlights,<?= $highlight->id ?>">

	<?php if ($highlight->isEmbed): ?>
		<?php if ($highlight->showOnlyCode()): ?>
		<div class="highlight-embed"><?= $highlight->code ?></div>
		<?php else: ?>
		<div class="highlight-embed is-responsive"><?= $highlight->code ?></div>
		<?php endif ?>
	<?php elseif ($highlight->imageFile): ?>
	<a href="<?= $highlight->url ?>" class="highlight-image">
		<img src="<?= $this->img('uploads/highlights/imageFile/'.$highlight->imageFile->getFilename(), 'home.') ?>">
	</a>
	<?php endif ?>

	<?php if (!$highlight->showOnlyCode()): ?>
	<a href="<?= $highlight->url ?>">
		<h2 class="highlight-title">
			<?php if (!empty($highlight->type)): ?>
			<strong class="highlight-type"><?= $highlight->type ?></strong>
			<?php endif ?>
			<?= $highlight->title ?>
		</h2>
	</a>
	<?php endif ?>
</li>