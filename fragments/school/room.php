<!-- fragments/school/room.php -->
<section class="school-room">
    <div
        class="container <?= rex_config::get("plus_bs5", "container_class") ?>">
        <?php

use Url\Url;

$manager = Url::resolveCurrent();

if ($manager) {
    $room = Room::get($manager->getDatasetId());
    if ($room) {
        $this->setVar("room", $room);
        $this->subfragment('school/room-details.php');
    }
} else {
    $rooms = Room::query()->find();
    if ($rooms) {
        $this->setVar("rooms", $rooms);
        $this->subfragment('school/room-list.php');
    }
}

?>
    </div>
</section>
<!-- fragments/school/room.php -->
