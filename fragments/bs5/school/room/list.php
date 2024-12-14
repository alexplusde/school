<?php

namespace Alexplusde\School;

/** @var rex_fragment $this */

$rooms = Room::getAll();
?>
<!-- BEGIN school/fragments/bs5/school/list.php -->
<table class="table" data-tablesorter>
    <thead>
        <tr>
            <th>Raum</th>
            <th>Etage</th>
            <th>Funktion</th>
            <th>Klassenraum</th>
            <th>AG-Raum</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($rooms as $room) {
            ?>
            <tr>
                <td><?= $room->getName() ?></td>
                <td><?= $room->getLocated() ?></td>
                <td><?= $room->getTitle() ?></td>
            </tr>
        <?php
        }
#        $room_anchors[] = '<a  class="btn btn-secondary"  href="'.rex_getUrl('', '', ['room-id' => $room->getValue('id')]).'">'.$room->getValue('name').'</a>';
?>
    </tbody>
</table>
<!-- END school/fragments/bs5/school/list.php -->
