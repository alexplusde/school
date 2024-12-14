<?php

use Alexplusde\BS5\Fragment;
use Alexplusde\BS5\Helper;

$requiredAddons = ['school', 'mform'];
if (!Helper::packageExists($requiredAddons)) {
    echo rex_view::error(rex_i18n::rawMsg('bs5_missing_addon', implode(', ', $requiredAddons)));
    return;
};

Helper::showBackendUserInstruction("Der Raumplan wird über das Addon 'school' verwaltet.", Helper::getBackendTableManagerEditLink('rex_school_room', 0, 'school/room'));

$fragment = new Fragment();
$fragment->setVar('slice_id', "REX_SLICE_ID");

echo $fragment->parse('school/room/index.php');
