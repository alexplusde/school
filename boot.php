<?php

namespace Alexplusde\School;

use rex_yform_manager_dataset;
use rex_config;
use rex;
use rex_extension;
use rex_extension_point;
use rex_be_controller;

rex_yform_manager_dataset::setModelClass(
    'rex_school_project',
    Project::class
);
rex_yform_manager_dataset::setModelClass(
    'rex_school_course',
    Course::class
);
rex_yform_manager_dataset::setModelClass(
    'rex_school_room',
    Room::class
);

rex_yform_manager_dataset::setModelClass(
    'rex_school_subject',
    Subject::class
);

rex_yform_manager_dataset::setModelClass(
    'rex_school_team',
    Team::class
);

rex_yform_manager_dataset::setModelClass(
    'rex_school_team_tags',
    TeamTag::class
);

if (rex::isBackend() && rex::isDebugMode() && rex_config::get('school', 'dev')) {
    School::writeModule();
    School::writeTemplate();
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
                    $event_date = \event_date::get($matches[3]);
                    if ($event_date) {
                        $url = $event_date->getUrl();
                    }
                    break;
                case 'rex-event-category':
                    $event_category = \event_category::get($matches[3]);
                    if ($event_category) {
                        $url = $event_category->getUrl();
                    }
                    break;
                case 'rex-school-course':
                    $school_course = Course::get($matches[3]);
                    if ($school_course) {
                        $url = $school_course->getUrl();
                    }
                    break;
                case 'rex-school-projects':
                    $school_project = Project::get($matches[3]);
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


if (rex::isBackend() && strpos(rex_be_controller::getCurrentPage(), "school") !== false || rex_be_controller::getCurrentPage() == "yform/manager/data_edit" || rex_be_controller::getCurrentPage() == "global_settings/settings") {
    rex_extension::register('OUTPUT_FILTER', function (rex_extension_point $ep) {
        $suchmuster = 'class="###school-settings-editor###"';
        $ersetzen = rex_config::get("school", "editor");
        $ep->setSubject(str_replace($suchmuster, $ersetzen, $ep->getSubject()));
    });
}
