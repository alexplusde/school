<?php

use Alexplusde\BS5\Fragment;
use Alexplusde\School\Team;

$team = rex_var::toArray("REX_VALUE[1]");
$team_ids = array_column($team, 'id');
$persons = Team::query()->where('id', $team_ids)->find();

?>
<section class="mt-5" id="modul-REX_SLICE_ID">
	<h2 class="h5">Kontakt</h2>
	<?php
    if ($persons !== null) {
        ?>
		<ul class="list-unstyled">
			<?php
                foreach ($persons as $person) {
                    $person_fragment = new Fragment();
                    $person_fragment->setVar('person', $person);
                    echo $person_fragment->parse("school/team/person.php");
                } // foreach ($team as $person_id)
        ?>
		</ul>
	<?php
    } // if (count($team))
?>
</section>
