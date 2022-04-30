<!-- fragments/school/room-list.php -->
<?php
$rooms = $this->getVar('rooms');
?>
<table class="table">
    <thead>
        <th>Raum</th>
        <th>Raumnummer</th>
        <th>Details</th>
        <th>Raumplan</th>
    </thead>
    <tbody>
        <?php foreach ($rooms as $room) { ?>
        <tr>
            <td><?= $room->getname(); ?>
            </td>
            <td><?= $room->gettitle(); ?>
            </td>
            <td><?= $room->getValue('located'); ?>
            </td>
            <td><a href="<?= $room->getUrl(); ?>"
                    class="btn btn-primary">Im Raumplan anzeigen</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<!-- fragments/school/room-list.php -->