<!-- fragments/school/event-list.php -->
<?php
$events = $this->getVar('events');
?>
<table class="table">
    <thead>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>Kürzel</th>
        <th>Kontakt</th>
        </th>
    </thead>
    <tbody>
        <?php foreach ($events as $event) { ?>
        <tr>
            <td><?= $event->getTitle(); ?>
            </td>
            <td><?= $event->getFormattedStartDate(); ?>
            </td>
            <td><?= $event->getFormattedEndDate(); ?>
            </td>
            <td></td>
            <td><a href="<?= $event->getUrl(); ?>"
                    class="btn btn-primary">Details</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<!-- fragments/school/event-list.php -->