<!-- fragments/school/team.php -->
<section class="school-team">
    <div
        class="container <?= rex_config::get("plus_bs5", "container_class") ?>">
        <?php

use Url\Url;

$manager = Url::resolveCurrent();

if ($manager) {
    $person = Team::get($manager->getDatasetId());
    if ($person) {
        $this->setVar("person", $person);
        $this->subfragment('school/team-details.php');
    }
} else {
    $team = Team::query()->find();
    if ($team) {
        $this->setVar("team", $team);
        $this->subfragment('school/team-list.php');
    }
}

?>
    </div>
</section>
<!-- fragments/school/team.php -->
