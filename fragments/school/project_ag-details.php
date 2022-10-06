<!-- fragments/school/project_ag-details.php -->
<?php
$project = $this->getVar('project_ag');
dump($project);
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
			<?= school_team::get($project->teacher_ids)->getFullName(); ?>;
		</div>
		<div class="">
			<h2>Raum</h2>
			<?= school_room::get($project->room_id)->getName(); ?>;
		</div>

	</div>
</div>
<!-- fragments/school/project_ag-details.php -->