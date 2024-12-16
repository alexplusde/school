<?php

use Alexplusde\BS5\Fragment;
use Alexplusde\BS5\Helper;

$requiredAddons = ['school', 'mform'];
if (!Helper::packageExists($requiredAddons)) {
    echo rex_view::error(rex_i18n::rawMsg('bs5_missing_addon', implode(', ', $requiredAddons)));
    return;
};

Helper::showBackendUserInstruction("Der Raumplan wird über das Addon 'school' verwaltet.", Helper::getBackendTableManagerEditLink('rex_school_room', 0, 'school/room'));

$fragment = new Fragment();
$fragment->setVar('slice_id', "REX_SLICE_ID");
$fragment->setVar('article_id', "REX_ARTICLE_ID");


?>
<h2 class="my-3">Neues <a class="btn btn-text" href="<?= rex_getUrl() ?>">Alle anzeigen</a></h2>
<?php
echo $fragment->parse("school/home/neues.php");
?>

<h2 class="my-3 mt-5">Über das Elly</h2>
<?php
$sections = rex_var::toArray("REX_VALUE[1]");

if (count($sections)) {
?>
    <ul class="list-unstyled">
        <?php
        foreach ($sections as $section) {
            $media = rex_media::get($section['REX_MEDIA_1']); ?>
            <li class="row mb-3">
                <div class="col-12 col-md-8">
                    <img src="/media/slideshow_home/<?php echo $section['REX_MEDIA_1'] ?>"
                        alt="<?php echo $section['title'] ?>"
                        height="1080" width="1920" class="img-fluid" />
                </div>
                <div class="col-12 col-md-4">
                    <h3 class="title h5"><?= $section['title']; ?></h3>
                    <div class="teaser"><?= $section['content']; ?>
                    </div>
                    <div class="url"><a class="btn btn-primary"
                            href="<?= rex_getUrl($section['REX_LINK_1']) ?? '' ?>">Weiterlesen</a>
                    </div>
                </div>
            </li>
        <?php
        } // foreach($images as $image)
        ?>
    </ul>
<?php
} // if(count($images))
?>
