<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title></title>

        <link rel="stylesheet" type="text/css" href="<?= $this->asset('css/styles.css') ?>">
        <?= $this->section('extra-head') ?>
    </head>

    <body>
        <div class="container">
            <?php $this->insert('partials/navbar'); ?>
            <?= $this->section('content') ?>
        </div>

    	<?php $this->insert('partials/navfooter'); ?>
        
        <script type="text/javascript" src="<?= $this->asset('js/main.js') ?>"></script>
    </body>
</html>