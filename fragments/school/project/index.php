<?php

namespace Alexplusde\School;

use Alexplusde\BS5\Fragment;
use Alexplusde\School\Project;
use Url\Url;

/** @var Fragment $this */
$project = $this->getVar('project');
?>
<!-- BEGIN school/fragments/bs5/school/project/index.php -->


<?php


$project = null;
$manager = Url::resolveCurrent();
if ($manager !== null) {
    /** @var Project $project */
    $project = $manager->getDataset();
}

if ($project === null) {
    echo $this->parseSubfragment('school/project/list.php');
    return;
}

if ($project !== null) {
    $this->setVar('project', $project);
    echo $this->parseSubfragment('school/project/details.php');
}
?>
<section id="modul-<?= $this->getVar('slice_id') ?>">
    <h2><?php echo $project->getName(); ?></h2>
    <div class="description">
        <?= $project->getValue('description'); ?>
    </div>
    <div class="project-gallery">
        <!-- Gallery Anfang -->
        <?php
        $images = array_filter(explode(",", $project->getValue('images'))); 
        if (count($images)) {
            $this->setVar('images', $images);
            echo $this->parse('bs5/school/project/gallery.php');
        } ?>
    </div>
</section>
