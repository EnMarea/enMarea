<?php 

use Jenssegers\Date\Date;

$social = new SocialLinks\Page([
	'url' => $this->url('home'),
	'title' => $text->title.' - En Marea',
	'image' => $this->asset('img/logo-rrss.png'),
	'twitterUser' => '@en_marea',
]);
?>

<?= $this->layout('layouts/default', ['social' => $social]) ?>

<?php $this->start('extra-head') ?>
<link rel="stylesheet" type="text/css" href="<?= $this->asset('css/pages/text.css') ?>">
<?php $this->stop(); ?>

<article class="text page-content">
	<header class="text-header">
		<h1 class="text-title"><?= $text->title ?></h1>
	</header>

	<?php if (!empty($text->intro)): ?>
	<div class="text-intro">
		<?= $text->intro ?>
	</div>
	<?php endif ?>

	<div class="text-body">
		<?php
		foreach ($text->body as $section) {
			$this->insert('partials/sections/'.$section['type'], ['section' => $section]);
		}
		?>
	</div>
</article>
