<?php

$social = new SocialLinks\Page([
    'url' => $this->url('home'),
    'title' => $texts->header->title,
    'text' => $texts->header->subtitle,
    'image' => $this->asset('img/img-rrss.png'),
    'twitterUser' => '@en_marea',
]);

$this->layout('layouts/default', ['social' => $social]);
?>

<?php $this->start('extra-head') ?>
<link rel="stylesheet" type="text/css" href="<?= $this->asset('css/pages/error.css') ?>">
<?php $this->stop(); ?>

<div class="page-content">
	<h1><?= $texts->header->title ?></h1>
	<p><?= $texts->header->subtitle ?></p>

	<?php if (isset($texts->btn)): ?>
	<a href="<?= $this->url('home') ?>" class="button">
		<?= $texts->btn ?>
	</a>
	<?php endif ?>
</div>
