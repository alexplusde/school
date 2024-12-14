<?php
use Alexplusde\BS5\Fragment;

setlocale(LC_ALL, rex_clang::getCurrent()->getValue('locale'), rex_clang::getCurrent()->getCode()); ?>
<!DOCTYPE html>
<html class="template-REX_TEMPLATE_KEY"
      lang="<?php echo rex_clang::getCurrent()->getCode(); ?>">

    <head>

        <link href="/media/bootstrap-min.css" rel="stylesheet" type="text/css">
        <link href="<?= speed_up_asset::getUrl("css/flexslider.css") ?>" rel="stylesheet" type="text/css">
        <link href="<?= speed_up_asset::getUrl("css/magnific-popup.css") ?>" rel="stylesheet" type="text/css">
        <link href="<?= speed_up_asset::getUrl("fonts/font-awesome.css") ?>" rel="stylesheet" type="text/css">
        <!-- /CSS -->
        <link rel="stylesheet" href="<?= speed_up_asset::getUrl('addons/plyr/vendor/plyr/dist/plyr.css') ?>">

        <!-- Webfonts -->
        <style nonce="<?= rex_response::getNonce() ?>">
            @font-face {
                font-family: 'Open Sans';
                src: url('/media/opensans-light-webfont.woff') format('woff');
                font-weight: 300;
                font-style: normal;

            }

            @font-face {
                font-family: 'Open Sans';
                src: url('/media/opensans-lightitalic-webfont.woff') format('woff');
                font-weight: 300;
                font-style: italic;

            }

            @font-face {
                font-family: 'Open Sans';
                src: url('/media/opensans-regular-webfont.woff') format('woff');
                font-weight: 400;
                font-style: normal;

            }

            @font-face {
                font-family: 'Open Sans';
                src: url('/media/opensans-italic-webfont.woff') format('woff');
                font-weight: 400;
                font-style: italic;

            }

            @font-face {
                font-family: 'Open Sans';
                src: url('/media/opensans-bold-webfont.woff') format('woff');
                font-weight: 700;
                font-style: normal;

            }


            @font-face {
                font-family: 'Open Sans';
                src: url('/media/opensans-bolditalic-webfont.woff') format('woff');
                font-weight: 700;
                font-style: italic;

            }
        </style>
        <!-- /Webfonts -->
        <?php
    $fragment = new Fragment();
$fragment->setVar('content1', "REX_ARTICLE[ctype=1]", false);
$fragment->setVar('content2', "REX_ARTICLE[ctype=2]", false);

echo $fragment->parse('bs5/template/meta.php');
?>
    </head>

    <body>
        <div class="screen-darken"></div>
        <?php

echo $fragment->parse('bs5/template/header.php');

echo $fragment->parse('bs5/template/breadcrumb.php');
echo $fragment->parse('bs5/template/main.php');

echo $fragment->parse('bs5/template/footer.php');
?>
        <script src="<?= speed_up_asset::getUrl("js/jquery-3.7.1.min.js") ?>"></script>
        <script src="<?= speed_up_asset::getUrl('js/bootstrap.bundle.min.js') ?>"></script>

        <script src="<?= speed_up_asset::getUrl("js/jquery.magnific-popup.min.js") ?>"></script>
        <script src="<?= speed_up_asset::getUrl("js/jquery.flexslider-min.js") ?>"></script>
        <script src="<?= speed_up_asset::getUrl("js/jquery.tablesorter.combined.min.js") ?>"></script>

        <script src="<?= speed_up_asset::getUrl('addons/plyr/vendor/plyr/dist/plyr.min.js') ?>"></script>
        <script src="<?= speed_up_asset::getUrl('addons/plyr/plyr_init.js') ?>"></script>

        <script src="<?= speed_up_asset::getUrl("js/ehkg.js") ?>"></script>

    </body>

</html>
