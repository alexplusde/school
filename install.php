<?php

namespace Alexplusde\School;

use Alexplusde\BS5\Helper;
use rex;
use rex_addon;
use rex_config;
use rex_file;
use rex_path;
use rex_yform_manager_table_api;
use rex_yform_manager_table;

if (rex_addon::get('yform') && rex_addon::get('yform')->isAvailable()) {
    rex_yform_manager_table_api::importTablesets(rex_file::get(rex_path::addon($this->name, 'install/rex_school.tableset.json')));
}

rex_yform_manager_table::deleteCache();

Helper::updateModule('school');
Helper::updateTemplate('school');

\rex_delete_cache();
