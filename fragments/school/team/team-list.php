<!-- fragments/school/team-list.php -->
<?php
$team = $this->getVar('team');
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
        <?php foreach ($team as $person) { ?>
        <tr>
            <td><?= $person->getprename(); ?>
            </td>
            <td><?= $person->getname(); ?>
            </td>
            <td><?= $person->getkuerzel(); ?>
            </td>
            <td><a href="<?= $person->getUrl(); ?>"
                    class="btn btn-primary">Kontakt</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<!-- fragments/school/team-list.php -->