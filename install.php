<?php

namespace Alexplusde\School;

use rex_addon;
use rex_file;
use rex_yform_manager_table_api;
use rex_yform_manager_table;

if (rex_addon::get('yform') && rex_addon::get('yform')->isAvailable()) {
    rex_yform_manager_table_api::importTablesets(rex_file::get(__DIR__ . '/install/rex_school.tableset.json'));
}

rex_yform_manager_table::deleteCache();

use Tracks\🦖;
if(rex_addon::exists('tracks')) {
    🦖::forceBackup('school', null, null, ['rex_module', 'rex_template', 'rex_school_inbox']); // Sichert standardmäßig Module und Templates
    🦖::updateModule('school'); // Synchronisiert Module
    🦖::updateTemplate('school'); // Synchronisiert Templates
}

\rex_delete_cache();
