<?php 

$social = new SocialLinks\Page([
    'url' => $this->url('repository'),
    'title' => 'Descargas',
    'text' => 'Material de descarga de En Marea',
    'image' => $this->asset('img/img-rrss.png'),
    'twitterUser' => '@en_marea',
]);
?>

<?= $this->layout('layouts/default', ['social' => $social]) ?>

<?php $this->start('extra-head') ?>
<link rel="stylesheet" type="text/css" href="<?= $this->asset('css/pages/repository.css') ?>">
<?php $this->stop(); ?>

<div class="page-header-container">
	<header>
		<h1>Descargas</h1>
	</header>

	<div class="page-intro">
		<p>bla, bla, bla</p>
	</div>
</div>

<div class="page-content">
	<ul class="gallery">
		<?php foreach ($gallery as $photo): ?>
		<li>
			<a href="#">
				<figure class="gallery-image">
					<img src="<?= $this->img('uploads/gallery/imageFile/'.$photo->imageFile->getFilename(), 'gallery.') ?>">

					<figcaption>
						<strong><?= $photo->title ?></strong>
					</figcaption>
				</figure>
			</a>
		</li>
		<?php endforeach ?>
	</ul>
</div>