<?php
namespace Alexplusde\School;

/** @var rex_fragment $this */
/** @var Room $room */
$room = $this->getVar('room');

?>
<h2>
    <?php echo $room->getValue('name'); ?><?php if ($room->getValue('title')) { ?> (<?php echo $room->getValue('title'); ?>)<?php } ?>
			</h2>
		<?php
        $courses = Course::query()->where('room_id', $room->getValue('id'))->find();

		$course_array = [];
		foreach ($courses as $course) {
			$course[] = $course->getName();
		}
		


        if ($courses !== null) {
            ?>
			<?=  implode(", ", $course_array) ?>
		<?php
        } 

        $projects = Project::query()->where('room_id',	$room->getValue('id'))->find();

		$project_array = [];
		foreach ($projects as $project) {
			 $project_array[] = $project->getName();
		}

        if ($projects !== null) {
            ?>
			<p>Dieser Raum wird genutzt von der AG <?= implode(", ", $project_array) ?></a>
			</p>
            <?php
        }
        ?>
	</div>
</section>
