<?php

rex_yform_manager_dataset::setModelClass(
    'rex_school_projects',
    school_project::class
);
rex_yform_manager_dataset::setModelClass(
    'rex_school_courses',
    school_course::class
);
rex_yform_manager_dataset::setModelClass(
    'rex_school_rooms',
    school_room::class
);

rex_yform_manager_dataset::setModelClass(
    'rex_school_subjects',
    school_subject::class
);

rex_yform_manager_dataset::setModelClass(
    'rex_school_team',
    school_team::class
);

rex_yform_manager_dataset::setModelClass(
    'rex_school_team_tags',
    school_team_tags::class
);


if (rex::isBackend() && rex::isDebugMode()) {
    school::writeModule();
    school::writeTemplate();
}
