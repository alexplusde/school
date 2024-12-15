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

        $tags = TeamTag::query()->where('status', 1, ">=")->orderBy('prio')->find();

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
            <div class="card team-card mb-4">
                <div class="card-header">
                    <h2 class="h4 mb-0">
                        <?= $tag->getName() ?>
                    </h2>
                </div>

                <div class="card-body">
                    <div class="row">
                        <!-- Spalte 1: Profilbild -->
                        <div class="col-md-4 text-center">
                            <?php if ($person_fav) { ?>
                                <div class="profile-image-wrapper mb-2">
                                    <img src="/media/person-thumb/<?= $person_fav->getImage() ?>"
                                        class="rounded-circle"
                                        alt="<?= $person_fav->getFullName() ?>">
                                </div>
                                <p class="text-muted"><?= $person_fav->getFullName() ?></p>
                            <?php } ?>
                            <?php if ($tag->getValue('article_id')) { ?>
                                <a href="<?= rex_getUrl($tag->getValue('article_id')) ?>"
                                    class="btn btn-outline-primary btn-sm">
                                    Weitere Informationen
                                </a>
                            <?php } ?>
                        </div>

                        <!-- Spalte 2: Funktion -->
                        <div class="col-md-4">
                            <?php if ($tag->getValue('description')) { ?>
                                <h5 class="function-title">Funktion</h5>
                                <p><?= $tag->getValue('description') ?></p>
                            <?php } ?>
                        </div>

                        <!-- Spalte 3: Team-Mitglieder -->
                        <div class="col-md-4">
                            <h5 class="team-title">Team</h5>
                            <div class="team-members">
                                <?= $names ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
<!-- END scholl/fragments/school/hierachy/index.php -->
