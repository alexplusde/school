<!-- fragments/school/project_ag.php -->
<section class="school-team">
<div
        class="container <?= rex_config::get("plus_bs5", "container_class") ?>">

        <?php

                            use Alexplusde\School\Project;
                            use Url\Url;

        $manager = Url::resolveCurrent();

        if ($manager) {
            $school_project = Project::get($manager->getDatasetId());
            if ($school_project) {
                $this->setVar("project_ag", $school_project);
                $this->subfragment('school/project_ag-details.php');
            }
        } else {
            $school_project = Project::query()->find();
            if ($school_project) {
                $this->setVar("projects_ag", $school_project);
                $this->subfragment('school/project_ag-list.php');
            }
        }

        ?>
</div>
</section>
<!-- fragments/school/project_ag.php -->
