<?php

use Alexplusde\BS5\Helper;

$requiredAddons = ['school', 'yform'];
if (!Helper::packageExists($requiredAddons)) {
    echo rex_view::error(rex_i18n::rawMsg('bs5_missing_addon', implode(', ', $requiredAddons)));
    return;
};

Helper::showBackendUserInstruction("Verwalte die Kontaktdaten über den Menüpunkt Schule.", Helper::getBackendTableManagerEditLink('rex_school', 'school/team/team'));

Helper::showBackendUserInstruction("Die empfangenen Nachrichten sind im Menüpunkt Schule > Posteingang.", Helper::getBackendTableManagerEditLink('rex_school_inbox', 'school/inbox'));

?>
