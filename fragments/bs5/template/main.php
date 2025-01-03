<?php

namespace Alexplusde\School;

/** @var rex_fragment $this */

use Alexplusde\BS5\Fragment;
use rex_article;

$content1 = $this->getVar('content1');
$content2 = $this->getVar('content2');

if ($content2 === '') {
    $class_content1 = 'col-12';
    $class_content2 = 'd-none';
} else {
    $class_content1 = 'col-12 col-md-9';
    $class_content2 = 'col-12 col-md-3';
}

?>
<!--  BEGIN school/fragments/bs5/template/main.php  -->
<main id="content" class="container">
    <article class="row">
        <div class="<?= $class_content1 ?>">
        <?php
if (rex_article::getCurrent()->getValue('art_hide_intro') !== "1") {
   $output = new Fragment();

    $output->setVar('title', rex_article::getCurrent()->getName(), false);
    $output->setVar('teaser', rex_article::getCurrent()->getValue('yrewrite_description'), false);

    /* REX_MEDIA */
    $output->setVar('image', rex_article::getCurrent()->getValue('yrewrite_image'));

    echo $output->parse('bs5/template/main-intro.php');
}
?>
            <?php echo $this->getVar('content1') ?>
        </div>
        <aside class="<?= $class_content2 ?>">
            <?php echo $this->getVar('content2') ?>
        </aside>
    </article>
</main>
<!--  END school/fragments/bs5/template/main.php  -->
