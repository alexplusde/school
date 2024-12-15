<?php

/**
 * Dieses Modul wird über das Addon school verwaltet und geupdatet.
 * Um das Modul zu entkoppeln, ändere den Modul-Key in REDAXO. Um die 
 * Ausgabe zu verändern, genügt es, das passende Fragment zu überschreiben.
 */

use Alexplusde\BS5\Helper;
use Alexplusde\School\Team;
use FriendsOfRedaxo\MForm;

/* Addon-Prüfung */
$requiredAddons = ['yform', 'school'];
if (!Helper::packageExists($requiredAddons)) {
    echo rex_view::error(rex_i18n::rawMsg('bs5_missing_addon', implode(', ', $requiredAddons)));
    return;
};

/* MForm */
$mform = new MForm();

$mform->addFieldsetArea("");

$options = [];
$team = Team::query()->select('name')->find();
foreach ($team as $person) {
    $options[$person->getId()] = $person->getFullName();
}

$mform->addSelectField("team_id", $options, ["label" => 'Ansprechperson']);

/* MForm Repeater */
$repeater = MForm::factory();
$repeater->addRepeaterElement(1, $mform);

echo $repeater->show();
