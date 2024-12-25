<?php

namespace Alexplusde\School;

use rex_sql;
use Alexplusde\BS5\Helper;

/** @var rex_fragment $this */

$teachers = Team::query()
    ->alias('t')
    ->where('t.is_teacher', '1')
    ->orderBy('t.name')
    ->find();

$subjects = [];
$subjects_sql = rex_sql::factory()->setDebug(0)->getArray('SELECT * FROM rex_school_subject');
foreach ($subjects_sql as $subject) {
    $subjects[$subject['id']] = $subject;
}
?>
<!-- BEGIN scholl/fragments/school/team/index.php -->
<section class="modul modul-school_teachers" id="modul-REX_SLICE_ID">
<?= Helper::getBackendEditLink(); ?>
        <table class="table  table-responsive" data-tablesort>
            <thead>
                <tr>
                    <th>Kürzel</th>
                    <th></th>
                    <th>Name</th>
                    <th>Fächer</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($teachers as $teacher) { ?>
                <tr>
                    <td><?= $teacher->getKuerzel(); ?></td>
                    <td><?= $teacher->getAnrede(); ?></td>
                    <td><?= $teacher->getFullName(); ?></td>
                    <td><?php
                                           $subject_ids = explode(',', $teacher->course_ids);
                    $subject_text = [];
                    foreach ($subject_ids as $subject_id) {
                        $subject_text[] = $subjects[$subject_id]['name'];
                    }
                    echo implode(', ', $subject_text);
                    ?></td>
                    <?php if ($teacher->status == 1) { ?>
                    <td><a href="<?= rex_getUrl('', '', ['team-id' => $teacher->id]) ?>">Kontakt</a></td>
                    <?php } else { ?>
                    <td></td>
                    <?php } ?>
                </tr>
                <?php } ?>
            </tbody>
            <tfoot>
            </tfoot>
        </table>
</section>
<!-- END scholl/fragments/school/team/index.php -->
