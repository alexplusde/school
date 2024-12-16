<?php

namespace Alexplusde\School;

use Url\Url;
use Alexplusde\BS5\Fragment;

$room = null;
$manager = Url::resolveCurrent();
if ($manager = Url::resolveCurrent()) {
    $room = $manager->getDataset();
}
/* Raumpläne als PDF (Dateinamen, kommagetrennt) */
$media = $this->getVar('media');

/** @var Fragment $fragment */
$fragment = new Fragment();

if ($room !== null) {

    $fragment->setVar('room', $room);
    echo $fragment->parseSubfragment('school/room/details.php');
}

if ($room === null) {
    echo $fragment->parseSubfragment('school/room/list.php');
}
