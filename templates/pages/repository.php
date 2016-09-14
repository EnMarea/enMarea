<?php 

$social = new SocialLinks\Page([
    'url' => $this->url('repository'),
    'title' => $text->title,
    'text' => $text->intro,
    'image' => $this->asset('img/img-rrss.png'),
    'twitterUser' => '@en_marea',
]);
?>

<?= $this->layout('layouts/default', ['social' => $social, 'menu' => 'repository']) ?>

<?php $this->start('extra-head') ?>
<link rel="stylesheet" type="text/css" href="<?= $this->asset('css/pages/repository.css') ?>">
<?php $this->stop(); ?>

<header class="page-header">
	<h1><?= $text->title ?></h1>
	<?= $text->intro ?>
</header>

<div class="page-content">
	<h2>Imaxes a alta resolución</h2>

	<ul class="gallery">
		<?php foreach ($gallery as $photo): ?>
		<li>
			<a href="<?= $this->asset('uploads/gallery/imageFile/'.$photo->imageFile->getFilename()) ?>" download>
				<figure class="gallery-image is-over">
					<img src="<?= $this->img('uploads/gallery/imageFile/'.$photo->imageFile->getFilename(), 'gallery.') ?>">

					<figcaption>
						<strong><?= $photo->title ?></strong>
					</figcaption>
				</figure>
			</a>
		</li>
		<?php endforeach ?>
	</ul>

	<h2>Posters de campaña</h2>

	<ul class="gallery">
		<?php foreach ($posters as $poster): ?>
		<li>
			<a href="<?= $this->asset('uploads/posters/file/'.$poster->file->getFilename()) ?>" download>
				<figure class="gallery-image is-bottom">
					<img src="<?= $this->img('uploads/posters/thumbFile/'.$poster->thumbFile->getFilename(), 'gallery.') ?>">

					<figcaption>
						<p><?= $poster->title ?></p>
					</figcaption>
				</figure>
			</a>
		</li>
		<?php endforeach ?>
	</ul>

	<h2>Kit básico cos logotipos e aplicacións básicas</h2>
	<?php foreach ($text->body as $section): ?>
		<?php $this->insert('partials/sections/'.$section['type'], ['section' => $section]) ?>
	<?php endforeach ?>
</div>