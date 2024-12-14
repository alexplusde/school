<?php

use Alexplusde\BS5\Fragment;
use Alexplusde\BS5\Helper;

/* Benötigte Addons */
$requiredAddons = ['school', 'mform'];
if (!Helper::packageExists($requiredAddons)) {
    echo rex_view::error(rex_i18n::rawMsg('bs5_missing_addon', implode(', ', $requiredAddons)));
    return;
};

/* Instruktionen */
Helper::showBackendUserInstruction("Der Raumplan wird über das Addon 'school' verwaltet.", Helper::getBackendTableManagerEditLink('rex_school_room', 0, 'school/room'));

/* Fragment */
$fragment = new Fragment();
$fragment->setVar('slice_id', "REX_SLICE_ID");

/* Modulspezifische Variablen */
$fragment->setVar('medialist', "REX_MEDIALIST[1]");

/* Ausgabe */
echo $fragment->parse('bs5/school/team/index.php');
