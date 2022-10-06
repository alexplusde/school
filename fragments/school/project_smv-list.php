<!-- fragments/school/project_ag-list.php -->
<?php
$projects = $this->getVar('projects_smv');
?>
<table class="table">
	<thead>
		<th>Name</th>
		<th>Treffzeit</th>
		<th>Treffpunkt</th>
		<th>Ansprechpartner</th>
		<th>Details</th>
		</th>
	</thead>
	<tbody>
		<?php foreach ($projects as $project) { ?>
		<tr>
			<td><?= $project->getName(); ?>
			</td>
			<td></td>
			<td></td>
			<td></td>
			<td><a href="<?= $project->getUrl("smv"); ?>"
					class="btn btn-primary">Details</a></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<!-- fragments/school/project_ag-list.php -->