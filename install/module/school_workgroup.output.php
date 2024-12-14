<?php

use Alexplusde\School\Project;
use Url\Url;

$gtb = null;
$manager = Url::resolveCurrent();
if ($manager !== null) {
    $gtb = $manager->getDataset();
}

if ($gtb === null) {
    ?>
<section class="modul modul-school_projects" id="modul-REX_SLICE_ID">
	<div class="row">
		<div class="col-md-12">
		<?php
$projects = Project::query()
            ->where('status', '1')
            ->where('type', 'ag')
            ->orderBy('weekdays')
            ->find(); ?>

		<table class="table" data-tablesort>
			<thead>
				<tr>
					<th>AG</th>
					<th>Treffzeiten</th>
					<th>Raum</th>
					<th>Ansprechpartner</th>
					<th>Bilder?</th>
					<th>Details</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($projects as $project) {
				    $room = $project->getRoom();
				    $persons = $project->getTeacher();
				    $teachers = [];
				    foreach ($persons as $person) {
				        /** @var Team $person */
				        $teachers[] = $person->getName();
				    } ?>
				<tr>
					<td class="name"><?= $project->getName(); ?>
					</td>
					<td data-sort="<?= $project->getWeekdays(); ?>">
						<?= $project->getTextDate(); ?>
					</td>
					<td><a
							href="<?= rex_getUrl('', '', ['room-id' => $room->getId()]); ?>"><?= $room->getName(); ?></a>
					</td>
					<td><?= implode(", ", $teachers); ?>
					</td>
					<td><?= count(array_filter(explode(",", $project->getImages()))); ?>
					</td>
					<td><?php if ($project->getDescription()) {?><a
							href="<?= rex_getUrl('', '', ['ag-id' => $project->getId()]) ?>">Details</a><?php } ?>
					</td>

				</tr>
				<?php
				} ?>
			</tbody>
			<tfoot>
			</tfoot>
		</table>
	</div>
</section>
<?php
}