<!-- fragments/school/event.php -->
<section class="school-event">
    <div
        class="container <?= rex_config::get("plus_bs5", "container_class") ?>">

        <?php

use Url\Url;

        $manager = Url::resolveCurrent();

        if ($manager) {
            $event = event_date::get($manager->getDatasetId());
            if ($event) {
                $this->setVar("event", $event);
                $this->subfragment('school/event-details.php');
            }
        } else {
            $events = event_date::query()->find();
            if ($events) {
                $this->setVar("events", $events);
                $this->subfragment('school/event-list.php');
            }
        }

        ?>
    </div>
</section>
<!-- fragments/school/event.php -->