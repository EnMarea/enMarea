<?php

use Jenssegers\Date\Date;
?>

<li>
	<article class="new is-list">
		<figure class="new-image">
			<a href="<?= $this->url('new', ['slug' => $new->slug]) ?>">
			<img src="<?= $this->img('uploads/news/imageFile/'.$new->imageFile->getFilename(), 'small.') ?>">
			</a>
		</figure>
		<div class="new-content">
			<header>
				<h2 class="new-title">
					<a href="<?= $this->url('new', ['slug' => $new->slug]) ?>">
						<?= $new->title ?>
					</a>
				</h2>
			</header>
			<div class="new-intro">
				<?= $new->intro ?>
			</div>
			<footer class="new-footer">
				<?php $date = Date::instance($new->createdAt); ?>
				<time class="new-time" title="<?= $date->format('l j F') ?>">
					<?= $date->diffForHumans() ?>
				</time>
			</footer>
		</div>
	</article>
</li>