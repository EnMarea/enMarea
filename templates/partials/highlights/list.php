<li class="highlight is-list">
	<a href="<?= $highlight->url ?>">
		<img class="highlight-image" src="<?= $this->asset('uploads/highlights/imageFile', $highlight->imageFile->getFilename()) ?>">

		<?php if (!empty($highlight->type)): ?>
		<strong class="highlight-type"><?php $highlight->type ?></strong>
		<?php endif ?>

		<h2 class="highlight-title"><?= $highlight->title ?></h2>
	</a>
</li>