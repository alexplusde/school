<?php

namespace Alexplusde\School;

use Url\Url;
use rex_fragment;

$room = null;
$manager = Url::resolveCurrent();
if ($manager = Url::resolveCurrent()) {
    $room = $manager->getDataset();
}
/* Raumpläne als PDF (Dateinamen, kommagetrennt) */
$media = $this->getVar('media');

/** @var rex_fragment $fragment */
$fragment = new rex_fragment();

if ($room !== null) {

    $fragment->setVar('room', $room);
    echo $fragment->subfragment('bs5/school/room/details.php');
}

if($room === null) {

    echo $fragment->subfragment('bs5/school/room/list.php');

}
