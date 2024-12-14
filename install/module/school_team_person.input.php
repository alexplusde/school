<?php

use FriendsOfRedaxo\MForm;

$mform1 = new MForm();

$mform1->addFieldsetArea("");

$team_sql = rex_sql::factory()->getArray('SELECT id, name FROM rex_school_team ORDER BY name');
$team = [];
$team[' '] = "Bitte wählen"; // Leer-Option
foreach ($team_sql as $person) {
    $team[$person['id']] = $person['name'];
}
$mform1->addSelectField("1.0.id", $team, ["label" => 'Mitarbeiter']);

echo MBlock::show(1, $mform1->show(), array('min'=>1,'max'=>10));
