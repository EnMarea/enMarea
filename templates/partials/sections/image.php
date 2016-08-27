<?php
$context = isset($context) ? $context : 'news';
?>

<?php if (empty($section['isWide'])): ?>
<figure class="section is-image">
	<img src="<?= $this->img('uploads/'.$context.'/imageFile/'.$section['imageFile'], 'normal.') ?>">
</figure>
<?php else: ?>
<figure class="section is-image is-wide">
	<img src="<?= $this->img('uploads/'.$context.'/imageFile/'.$section['imageFile'], 'landscape.') ?>">
</figure>
<?php endif ?>
