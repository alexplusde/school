<?php

namespace Alexplusde\School;

use Alexplusde\BS5\Fragment;
use Alexplusde\BS5\Helper;
use rex_var;

/** @var rex_fragment $this */

$team = rex_var::toArray("REX_VALUE[1]");
$team_ids = array_column($team, 'id');
$persons = Team::query()->where('id', $team_ids)->find();

?>
<!-- BEGIN scholl/fragments/school/responsible/index.php -->
 <section class="mt-5" id="modul-REX_SLICE_ID">
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
<!-- END scholl/fragments/school/responsible/index.php -->
