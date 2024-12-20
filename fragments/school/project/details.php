<!-- fragments/school/project_ag-details.php -->
<?php

use Alexplusde\School\Room;
use Alexplusde\School\Team;

$project = $this->getVar('project');

?>
<h1><?= $project->getName(); ?>
</h1>
<div class="row">
	<div class="col-md-8">
		<div class="">
			<?= $project->getDescription() ?>;
		</div>
	</div>
	<div class="col-md-4">
		<div class="">
			<h2>Treffzeiten</h2>
			<?= $project->text_date ?>;
			<h2>Betreuung durch</h2>
			<?= Team::get($project->teacher_ids)->getFullName(); ?>;
		</div>
		<div class="">
			<h2>Raum</h2>
			<?= Room::get($project->room_id)->getName(); ?>;
		</div>

	</div>
</div>
<!-- fragments/school/project/details.php -->
