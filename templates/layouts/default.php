<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
<!--
Deseño e desenvolvemento:
┌─┐┌─┐┌─┐┌─┐┬─┐  ┌─┐┌┬┐┌─┐┬─┐┌─┐
│ │└─┐│  ├─┤├┬┘  │ │ │ ├┤ ├┬┘│ │
└─┘└─┘└─┘┴ ┴┴└─  └─┘ ┴ └─┘┴└─└─┘
https://oscarotero.com
-->
        <title><?= $social->getTitle() ?></title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <?php
        //Social links
        foreach ($social->openGraph() as $meta) {
            echo $meta."\n";
        }
        foreach ($social->twitterCard() as $meta) {
            echo $meta."\n";
        }
        foreach ($social->html() as $meta) {
            echo $meta."\n";
        }
        foreach ($social->schema() as $meta) {
            echo $meta."\n";
        }
        ?>

        <link rel="stylesheet" type="text/css" href="<?= $this->asset('css/styles.css') ?>">
        <?= $this->section('extra-head') ?>
    </head>

    <body>
        <div class="container">
            <?php $this->insert('partials/navbar', ['menu' => isset($menu) ? $menu : null]); ?>
            <?= $this->section('content') ?>
        </div>

    	<?php $this->insert('partials/navfooter'); ?>
        
        <script type="text/javascript" src="<?= $this->asset('js/main.js') ?>"></script>
        <script>
          try {console.log(document.createNodeIterator(document.head, NodeFilter.SHOW_COMMENT).nextNode().nodeValue)}catch(e){};
        </script>
    </body>
</html>