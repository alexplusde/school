<?php

namespace Alexplusde\School;

use FriendsOfRedaxo\Neues\Entry;

/** @var rex_fragment $this */

/* Neues: Letzte 3 News */
$news = Entry::query()
    ->limit(3)
    ->where('status', 1, '>=')
    ->orderBy('publishdate', 'desc')
    ->find();

?>
<!-- BEGIN school/home/neues.php -->
<div class="row">
    <?php

    foreach ($news as $entry) {
        $this->setVar('entry', $entry);
        echo $this->parse('school/home/neues-entry.php');
    }
?>
</div>
<!-- END school/home/neues.php -->
