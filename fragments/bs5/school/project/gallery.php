<?php

namespace Alexplusde\School;

use rex_media_plus;

/** @var \rex_fragment $this */
$images = $this->getVar('images');
/** @var array $images */
?>
<!-- BEGIN school/fragments/bs5/school/project/gallery.php -->
<div class="images-wrapper" data-flexslider="true" data-magnific="gallery">
    <ul class="list-unstyled row g-3">
        <?php
        foreach ($images as $image) {
            $media = rex_media_plus::get($image);
            if ($media) {
                $this->setVar('media', $media);
                echo $this->subfragment('bs5/school/project/gallery-item.php');
            }
        } ?>
    </ul>
</div>
<!-- END school/fragments/bs5/school/project/gallery.php -->
