<div class="share">
	<strong>Compartir:</strong>
	
	<a href="<?= $social->twitter->shareUrl ?>" class="share-twitter js-share">
		<?= $this->svg('ico-twitter')->withA11y('Compartir en Twitter') ?>
	</a>
	<a href="<?= $social->facebook->shareUrl ?>" class="share-facebook js-share">
		<?= $this->svg('ico-facebook')->withA11y('Compartir en Facebook') ?>
	</a>
</div>