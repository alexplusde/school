<!-- fragments/school/project_ag.php -->
<section class="school-team">
<div
        class="container <?= rex_config::get("plus_bs5", "container_class") ?>">

        <?php

use Url\Url;

$manager = Url::resolveCurrent();

if ($manager) {
    $school_project = school_project::get($manager->getDatasetId());
    if ($school_project) {
        $this->setVar("project_ag", $school_project);
        $this->subfragment('school/project_ag-details.php');
    }
} else {
    $school_project = school_project::query()->find();
    if ($school_project) {
        $this->setVar("projects_ag", $school_project);
        $this->subfragment('school/project_ag-list.php');
    }
}

?>
</div>
</section>
<!-- fragments/school/project_ag.php -->
