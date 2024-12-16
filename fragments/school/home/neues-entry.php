<?php

namespace Alexplusde\School;

use FriendsOfRedaxo\Neues\Entry;

/** @var rex_fragment $this */
/** @var Entry $entry */
$entry = $this->getVar('entry');

/* Teaser auf 100 Zeichen kürzen */
$teaser = $entry->getTeaser();
if (strlen($teaser) > 100) {
    $teaser = substr($teaser, 0, 100) . '...';
}
/* Übersdchrift auf 60 Zeichen kürzen */
$name = $entry->getName();
if (strlen($name) > 50) {
    $name = substr($name, 0, 50) . '...';
}
$category = $entry->getCategories()->first();
$category_name = 'Allgemein';
if ($category !== null) {
    $category_name = $category->getName() ?? 'Allgemein';
}
?>
<!-- BEGIN school/home/neues.php -->
<div class="col-12 col-md-4">
    <div class="card h-100">
        <div class="card-body">
            <p>
                <small><?= $entry->getFormattedPublishDate() ?></small>
            </p>
            <span class="badge badge-primary p-1 my-1 text-white"><?= $category_name ?></span>
            <h3 class="card-title h5">
                <a href="<?= $entry->getUrl() ?>" title="<?= $entry->getName() ?>"><?= $name ?></a>
            </h3>
            <p class="card-text"><?= $teaser ?></p>
        </div>
        <div class="card-footer">
            <a href="<?= $entry->getUrl() ?>" class="btn btn-primary">Weiterlesen</a>
        </div>
    </div>
</div>
<!-- END school/home/neues.php -->
