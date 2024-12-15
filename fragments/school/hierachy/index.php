<?php

namespace Alexplusde\School;

use rex_sql;
use Alexplusde\BS5\Helper;

/** @var rex_fragment $this */
?>
<!-- BEGIN scholl/fragments/school/hierachy/index.php -->
<section class="position-relative" id="modul-<?= $this->getVar('slice_id'); ?>">
    <div class="modul-organisation-list">
        <?= Helper::getBackendEditLink(); ?>
        <?php

        $tags = TeamTag::query()->find();

        foreach ($tags as $tag) {
            $teachers = $tag->getTeam();
            $person_fav = $tag->getTeamFav();

            $teachers_names = [];
            foreach ($teachers as $teacher) {
                /** @var Team $teacher */
                $teachers_names[] = $teacher->getFullName();
            }
            $names = implode(", ", $teachers_names);

        ?>
            <div class="team-orga-field">
                <h2><?= $tag->getName() ?>
                    <?php if ($person_fav) { ?>
                        (<?= $person_fav->getName() ?>)<?php } ?>
                </h2>
                <?php if ($tag->getValue('article_id')) { ?>
                    <div class="team-orga-link"><a href="<?= rex_getUrl($tag->getValue('article_id')) ?>">Weitere
                            Informationen</a></div>
                <?php } ?>
                <div class="team-orga-description"><?= $tag->getValue('description') ?>
                    <div class="team-orga-people">
                        <?= $names ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
<!-- END scholl/fragments/school/hierachy/index.php -->
