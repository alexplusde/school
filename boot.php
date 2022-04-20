<?php

rex_yform_manager_dataset::setModelClass(
    'rex_yrewrite_school_project',
    school_project::class
);
rex_yform_manager_dataset::setModelClass(
    'rex_yrewrite_school_course',
    school_course::class
);
rex_yform_manager_dataset::setModelClass(
    'rex_yrewrite_school_room',
    school_room::class
);

rex_yform_manager_dataset::setModelClass(
    'rex_yrewrite_school_subject',
    school_subject::class
);

rex_yform_manager_dataset::setModelClass(
    'rex_yrewrite_school_team',
    school_team::class
);


if (rex::isBackend() && rex::isDebugMode()) {
    school::writeModule();
    school::writeTemplate();
}
