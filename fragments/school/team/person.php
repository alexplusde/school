<?php

use Alexplusde\School\Team;

/** @var Fragment $this  */
/** @var Team $person */
$person = $this->getVar('person');
/** @var rex_media_plus $media */
$media = $person->getBild(true);
if ($media === null) {
    $media = rex_media_plus::get(rex_config::get('school', 'team_default_image'));
}
?>
<!-- BEGIN school/fragments/school/team/person.tpl.php -->
<li class="card">
		<div class="row p-3">
			<div class="col-3 pr-0">
				<?php if ($media) {
				    echo $media->setClass("img-fluid rounded-circle")->getImg('person-thumb') ?>
				<?php } ?>
			</div>
			<div class="col-9">
				<strong><?= $person->getFullName() ?></strong><br>
					<span class="mb-1 small"><?= $person->getJob() ?></span>
					<br>
					<a class="btn btn-small btn-secondary" href="<?= $person->getUrl() ?>">
						Kontakt
				</a>

			</div>
		</div>
</li>
<!-- END school/fragments/school/team/person.tpl.php -->
