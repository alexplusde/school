<!-- fragments/school/project_smv.php -->
<section class="school-team">
    <div
        class="container <?= rex_config::get("plus_bs5", "container_class") ?>">
        <?php

use Url\Url;

$manager = Url::resolveCurrent();

if ($manager) {
    $project_smv = school_project::get($manager->getDatasetId());
    if ($project_smv) {
        $this->setVar("project_smv", $project_smv);
        $this->subfragment('school/project_smv-details.php');
    }
} else {
    $projects_smv = school_project::query()->find();
    if ($projects_smv) {
        $this->setVar("projects_smv", $projects_smv);
        $this->subfragment('school/project_smv-list.php');
    }
}

?>
    </div>
</section>
<!-- fragments/school/project_smv.php -->