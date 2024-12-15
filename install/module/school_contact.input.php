<?php

use Alexplusde\BS5\Helper;
use Alexplusde\School\Team;
use FriendsOfRedaxo\MForm;

$requiredAddons = ['school', 'yform'];
if (!Helper::packageExists($requiredAddons)) {
    echo rex_view::error(rex_i18n::rawMsg('bs5_missing_addon', implode(', ', $requiredAddons)));
    return;
};

Helper::showBackendUserInstruction("Verwalte die Kontaktdaten über den Menüpunkt Schule.", Helper::getBackendTableManagerEditLink('rex_school', 'school/team/team'));

Helper::showBackendUserInstruction("Die empfangenen Nachrichten sind im Menüpunkt Schule > Posteingang.", Helper::getBackendTableManagerEditLink('rex_school_inbox', 'school/inbox'));

/** MForm - einzelnes Kontaktformular für eine Person */
$mform = new MForm();

$options = [];
$team = Team::query()->select('name')->find();
foreach ($team as $person) {
    $options[$person->getId()] = $person->getFullName();
}

$mform->addSelectField(3, $options, null, 1);

echo $mform->show();
?>
