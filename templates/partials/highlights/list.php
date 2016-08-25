<li class="highlight is-list">
	<a href="<?= $highlight->url ?>">
		<div class="highlight-image">
			<img src="<?= $this->img('uploads/highlights/imageFile/'.$highlight->imageFile->getFilename(), 'small.') ?>">

			<p class="highlight-details">
				<?php if (!empty($highlight->type)): ?>
				<strong class="highlight-type"><?= $highlight->type ?></strong>
				<?php endif ?>

				<?php if (!empty($highlight->province)): ?>
				<em class="highlight-province"><?= $highlight->province ?></em>
				<?php endif ?>
			</p>
		</div>

		<h2 class="highlight-title"><?= $highlight->title ?></h2>
	</a>
</li>