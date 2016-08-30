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

        <link rel="apple-touch-icon" sizes="180x180" href="<?= $this->asset('apple-touch-icon.png') ?>">
        <link rel="icon" type="image/png" href="<?= $this->asset('favicon-32x32.png') ?>" sizes="32x32">
        <link rel="icon" type="image/png" href="<?= $this->asset('favicon-16x16.png') ?>" sizes="16x16">
        <link rel="manifest" href="<?= $this->asset('manifest.json') ?>">
        <link rel="mask-icon" href="<?= $this->asset('safari-pinned-tab.svg') ?>" color="#5bbad5">
        <link rel="shortcut icon" href="<?= $this->asset('favicon.ico') ?>">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="msapplication-TileImage" content="<?= $this->asset('mstile-144x144.png') ?>">
        <meta name="msapplication-config" content="<?= $this->asset('browserconfig.xml') ?>">
        <meta name="theme-color" content="#ffffff">

        <?= $this->section('extra-head') ?>
    </head>

    <body>
        <div class="container">
            <?php $this->insert('partials/navbar', ['menu' => isset($menu) ? $menu : null]); ?>
            <?= $this->section('content') ?>
        </div>

    	<?php $this->insert('partials/navfooter'); ?>

        <div class="cookies js-cookies is-accepted">
            <p>
                Navegar por esta web coas cookies activadas no navegador conleva de maneira imprescindible a aceptación do uso das mesmas conforme a presente política.
            </p>
            <a class="cookies-link" href="<?= $this->url('privacy') ?>">Saber máis</a>
            <button class="cookies-accept js-cookies-accept">De acordo</button>
        </div>
        
        <script type="text/javascript" src="<?= $this->asset('js/main.js') ?>"></script>
        <script>
          try {console.log(document.createNodeIterator(document.head, NodeFilter.SHOW_COMMENT).nextNode().nodeValue)}catch(e){};
        </script>

        <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
        <script>
            window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
            ga('create','UA-83388930-1','auto');ga('send','pageview')
        </script>
        <script src="https://www.google-analytics.com/analytics.js" async defer></script>
    </body>
</html>