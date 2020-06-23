<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <?= view_cell('App\Controllers\Render::meta_tag',['title'=>$title]) ?>

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="<?= base_url('assets/media/favicons/favicon.png');?>">
        <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('assets/media/favicons/favicon-192x192.png');?>">
        <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/media/favicons/apple-touch-icon-180x180.png');?>">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Fonts and OneUI framework -->
        <link rel="stylesheet" href="<?= base_url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700');?>">
        <link rel="stylesheet" id="css-main" href="<?= base_url('assets/css/oneui.min.css');?>">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="<?= base_url('assets/css/themes/amethyst.min.css');?>"> -->
        <!-- END Stylesheets -->
        
        <?= csrf_meta() ?>
    </head>
    <body>
        
    <?= $this->renderSection('content') ?>

    
        <!-- END Page Container -->

        <!--
            OneUI JS Core

            Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
            to handle those dependencies through webpack. Please check out assets/_es6/main/bootstrap.js for more info.

            If you like, you could also include them separately directly from the assets/js/core folder in the following
            order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

            assets/js/core/jquery.min.js
            assets/js/core/bootstrap.bundle.min.js
            assets/js/core/simplebar.min.js
            assets/js/core/jquery-scrollLock.min.js
            assets/js/core/jquery.appear.min.js
            assets/js/core/js.cookie.min.js
        -->
        <script src="<?= base_url('assets/js/oneui.core.min.js');?>"></script>

        <!--
            OneUI JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at assets/_es6/main/app.js
        -->
        <script src="<?= base_url('assets/js/oneui.app.min.js');?>"></script>

        <!-- Page JS Plugins -->
        <script src="<?= base_url('assets/js/plugins/jquery-validation/jquery.validate.min.js');?>"></script>

        <!-- Page JS Code -->
    <?= $this->renderSection('js') ?> 
    </body>
</html>
