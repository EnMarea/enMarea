<?php 
$social = new SocialLinks\Page([
    'url' => $this->url('supports'),
    'title' => $text->title,
    'text' => $text->intro,
    'image' => $this->asset('img/img-rrss.png'),
    'twitterUser' => '@en_marea',
]);
?>

<?= $this->layout('layouts/default', ['social' => $social]) ?>

<?php $this->start('extra-head') ?>
<link rel="stylesheet" type="text/css" href="<?= $this->asset('css/pages/supports.css') ?>">
<?php $this->stop(); ?>

<div class="page-header">
	<header>
		<h1><?= $text->title ?></h1>
		<?= $text->intro ?>

	</header>
</div>

<div class="page-content">
    <?php
    foreach ($text->body as $section) {
        $this->insert('partials/sections/'.$section['type'], ['section' => $section, 'context' => 'texts']);
    }
    ?>

    <h2>Asinantes:</h2>

    <ol class="page-people">
        <?php foreach ($supports as $person): ?>
        <?php
        if (!$person->isInitial) {
            continue;
        }
        ?>
        <li class="person">
            <strong class="person-name">
                <?= $person->name ?>
            </strong>
            <span class="person-profession">
                <?= $person->profession ?>
            </span>
        </li>
        <?php endforeach ?>
    </ol>

    <div class="page-form">
        <h2>Asina ti tamén o manifesto</h2>

        <?= $form ?>

        <p class="page-legal">
            De acordo co artigo 5 da Lei Orgánica 15/1999, de protección de datos de carácter persoal, informamos que os datos facilitados serán incorporados e tratados nun ficheiro titularidade de EN MAREA para o seu uso exclusivo no eido desta iniciativa.
        </p>
    </div>

    <h2 id="asinantes">Tamén asinaron:</h2>

    <ol class="page-people">
        <?php foreach ($supports as $person): ?>
        <?php
        if ($person->isInitial) {
            continue;
        }
        ?>
        <li class="person">
            <strong class="person-name">
                <?= $person->name ?>
            </strong>
            <span class="person-profession">
                <?= $person->profession ?>
            </span>
        </li>
        <?php endforeach ?>
    </ol>
</div>
