<?php

namespace Alexplusde\School;

use rex_file;
use rex_path;
use rex_yform_manager_table_api;
use rex_yform_manager_table;

rex_yform_manager_table_api::importTablesets(rex_file::get(rex_path::addon($this->name, 'install/rex_school.tableset.json')));

rex_yform_manager_table::deleteCache();

// School::updateModule();
// School::updateTemplate();
