<!-- fragments/school/room-list.php -->
<?php
$rooms = $this->getVar('rooms');
?>
<table class="table">
    <thead>
        <th>Raum</th>
        <th>Raumnummer</th>
        <th>Details</th>
    </thead>
    <tbody>
        <?php foreach ($rooms as $room) { ?>
        <tr>
            <td><?= $room->getname(); ?>
            </td>
            <td><?= $room->gettitle(); ?>
            </td>
            <td><a href="<?= $room->getUrl(); ?>"
                    class="btn btn-primary">Details</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<!-- fragments/school/room-list.php -->