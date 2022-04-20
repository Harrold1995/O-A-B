<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="Cache-control" content="public">
        <meta name="robots" content="noindex, nofollow" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" type="image/x-icon" href="<?= theme("/assets/img/favicon.ico"); ?>">
        <link rel="apple-touch-icon" sizes="180x180" href="<?= theme("/assets/img"); ?>/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= theme("/assets/img"); ?>/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= theme("/assets/img"); ?>/favicon-16x16.png">

        <meta name="theme-color" content="#014070">
        <meta name="msapplication-navbutton-color" content="#014070">
        <meta name="apple-mobile-web-app-status-bar-style" content="#014070">

        <?= $head; ?>
        <link href="https://vjs.zencdn.net/7.17.0/video-js.css" rel="stylesheet" />
        <link href="<?= theme("/dist/style.css") ?>" rel="stylesheet">


        <?= $v->section("styles"); ?>

    </head>

    <body <?= ((isset($idBody) ? 'id="'.$idBody.'"' : '' )) ?> data-spy="scroll" data-target=".navbar" data-offset="50">
        <div id="loader">
            <div class="loader isloading">
                <div class="spinner">
                    <div class="preloader-spin"></div>
                </div>
            </div>
        </div>

        <?= $v->insert("inc/header"); ?>


        <?= $v->section("content"); ?>


        <?= $v->insert("inc/footer"); ?>

        <script src="https://vjs.zencdn.net/7.17.0/video.min.js"></script>
        <!-- <script src="template/js/plugins/videojs/video-js-ie8.js"></script> -->
        <script src="<?= theme("/dist/script.js"); ?>"></script>
        <?= $v->section("scripts"); ?>

    </body>

</html>
