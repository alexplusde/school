<?php

use Alexplusde\BS5\Helper;
use FriendsOfRedaxo\MForm;

$requiredAddons = ['school', 'yform'];
if (!Helper::packageExists($requiredAddons)) {
    echo rex_view::error(rex_i18n::rawMsg('bs5_missing_addon', implode(', ', $requiredAddons)));
    return;
};

Helper::showBackendUserInstruction("Verwalte die Liste über den Menüpunkt Schule.", Helper::getBackendTableManagerEditLink('rex_school', 'school/team/team'));

?>
