<?php

namespace Alexplusde\School;

use rex_sql;
use Alexplusde\BS5\Helper;

/** @var rex_fragment $this */
?>
<!-- BEGIN scholl/fragments/school/hierachy/index.php -->
<section class="position-relative" id="modul-<?= $this->getVar('slice_id'); ?>">
    <?= Helper::getBackendEditLink(); ?>

    <div class="panel-group" id="teamAccordion">
        <?php
        $tags = TeamTag::query()->where('status', 1, ">=")->find();
        $counter = 0;
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
            <div class="panel panel-default team-panel">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#teamAccordion" href="#collapse<?= $counter ?>">
                            <?= $tag->getName() ?>
                        </a>
                    </h4>
                </div>
                <div id="collapse<?= $counter ?>" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="row">
                            <!-- Spalte 1: Profilbild -->
                            <div class="col-md-4 text-center">
                                <?php if ($person_fav) { ?>
                                    <div class="profile-image-wrapper mb-2">
                                        <img src="/media/<?= $person_fav->getImage() ?>"
                                            class="rounded-circle profile-image"
                                            alt="<?= $person_fav->getFullName() ?>">
                                    </div>
                                    <p class="text-muted
                                    <?= $person_fav->getFullName() ?>
                                <?php } ?>
                                <?php if ($tag->getValue('article_id')) { ?>
                                    <a href=" <?= rex_getUrl($tag->getValue('article_id')) ?>"
                                        class="btn btn-outline-primary btn-sm">
                                        Weitere Informationen
                                        </a>
                                    <?php } ?>
                            </div>

                            <!-- Spalte 2: Funktion -->
                            <div class="col-md-4">
                                    <h5 class="function-title">Funktion</h5>
                                    <?php if ($tag->getValue('description')) { ?>
                                        <p><?= $tag->getValue('description') ?></p>
                                <?php } ?>
                            </div>

                            <!-- Spalte 3: Team-Mitglieder -->
                            <div class="col-md-4">
                                <h5 class="team-title">
                                    Team
                                </h5>
                                <div class=" team-members">
                                    <?= $names ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            $counter++;
        }
        ?>
    </div>
</section>
