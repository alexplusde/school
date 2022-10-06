<?php

rex_yform_manager_dataset::setModelClass(
    'rex_school_project',
    school_project::class
);
rex_yform_manager_dataset::setModelClass(
    'rex_school_course',
    school_course::class
);
rex_yform_manager_dataset::setModelClass(
    'rex_school_room',
    school_room::class
);

rex_yform_manager_dataset::setModelClass(
    'rex_school_subject',
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

if (rex::isBackend() && rex::isDebugMode() && rex_config::get('school', 'dev')) {
    school::writeModule();
    school::writeTemplate();
}


\rex_extension::register('OUTPUT_FILTER', function (\rex_extension_point $ep) {
    return preg_replace_callback(
        '@(rex-(school-team|school-subject|school-projects|school-room|school-course|event-date|event-category))://(\d+)(?:-(\d+))?/?@i',
        function ($matches) {
            // table = $matches[1]
            // id = $matches[3]
            $url = '';
            switch ($matches[1]) {
                case 'rex-school-team':
                    $person = team::get($matches[3]);
                    if ($person) {
                        $url = $person->getUrl();
                    }
                    break;
                case 'rex-event-date':
                    $event_date = event_date::get($matches[3]);
                    if ($event_date) {
                        $url = $event_date->getUrl();
                    }
                    break;
                case 'rex-event-category':
                    $event_category = event_category::get($matches[3]);
                    if ($event_category) {
                        $url = $event_category->getUrl();
                    }
                    break;
                case 'rex-school-course':
                    $school_course = school_course::get($matches[3]);
                    if ($school_course) {
                        $url = $school_course->getUrl();
                    }
                    break;
                case 'rex-school-projects':
                    $school_project = school_project::get($matches[3]);
                    if ($school_project) {
                        $url = $school_project->getUrl();
                    }
                    break;
            }
            return $url;
        },
        $ep->getSubject()
    );
}, rex_extension::NORMAL);
