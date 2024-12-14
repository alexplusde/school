<?php

use Alexplusde\BS5\Helper;

?>
<section class="modul modul-organisation" id="modul-REX_SLICE_ID">
	<div class="wrapper">
		<div class="modul-organisation-list">
			<?= Helper::getBackendEditLink(); ?>
			<?php

            $tags = rex_yform_manager_table::get('rex_school_team_tag')->query()->find();

foreach ($tags as $tag) {
    $person_fav = [];
    $teachers = [];
    $names = [];
    $teachers = rex_sql::factory()->getArray("SELECT * FROM rex_school_team WHERE FIND_IN_SET(id, :ids)", ["ids" => $tag->getValue("team_id")]);
    $person_fav = rex_sql::factory()->getArray("SELECT * FROM rex_school_team WHERE id = :id", ["id" => $tag->getValue("team_id_fav")]);
    foreach ($teachers as $teacher) {
        $names[] = $teacher['name'];
    }

    ?>
			<div class="team-orga-field">
				<h2><?= $tag->getValue("name") ?>
					<?php if ($person_fav) { ?>
					(<?= $person_fav[0]["name"] ?>)<?php } ?>
				</h2>
                <?php if ($tag->getValue('article_id')) { ?>
				<div class="team-orga-link"><a href="<?= rex_getUrl($tag->getValue('article_id')) ?>">Weitere
						Informationen</a></div>
                <?php } ?>
				<div class="team-orga-description"><?= $tag->getValue('description') ?>
					<?php if (is_array($names)) { ?>
					<div class="team-orga-people">
						<?= implode(", ", $names) ?>
					</div>
					<?php } // is_array($names)?>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</section>
