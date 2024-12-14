<?php

namespace Alexplusde\School;

/** @var \Fragment $this */
$media = $this->getVar('media');
/** @var rex_media_plus $media */
?>
<!-- BEGIN school/fragments/bs5/school/project/gallery-item.php -->
<li class="col-12 col-md-6 col-lg-4">
    <a class="d-block" href="<?= $media->getFrontendUrl($media) ?>"
        title="<?php echo $media->getTitle() ?>">
        <?= $media->setClass('img-fluid')->getImg('gallery-image') ?>
    </a>
</li>
<!-- END school/fragments/bs5/school/project/gallery-item.php -->
