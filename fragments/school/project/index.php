<?php

namespace Alexplusde\School;

/** @var \Fragment $this */
/** @var Project $project */
$project = $this->getVar('project');
?>
<!-- BEGIN school/fragments/bs5/school/project/index.php -->
<section class="modul modul-project" id="modul-REX_SLICE_ID">
        <h2><?php echo $project->getName(); ?></h2>
        <div class="project-description">
            <?= $project->getValue('description'); ?>
        </div>
        <div class="project-gallery">
            <!-- Gallery Anfang -->
            <?php
            $images = array_filter(explode(",", $project->getValue('images'))); ?>
            <h3><?= $this->getVar('title', 'Bildergalerie') ?></h3>
            <p class="teaser"><?= $this->getVar('teaser') ?></p>
            <?php
            if (count($images)) {

                $this->setVar('images', $images);
                echo $this->parse('bs5/school/project/gallery.php');
            } ?>
        </div>
        </section>
