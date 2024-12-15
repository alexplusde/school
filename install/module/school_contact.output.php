<?php

use Alexplusde\BS5\Fragment;
use Alexplusde\BS5\Helper;

/* Benötigte Addons */
$requiredAddons = ['school', 'yform'];
if (!Helper::packageExists($requiredAddons)) {
    echo rex_view::error(rex_i18n::rawMsg('bs5_missing_addon', implode(', ', $requiredAddons)));
    return;
};

/* Instruktionen */
Helper::showBackendUserInstruction("Verwalte die Kontaktdaten über den Menüpunkt Schule.", Helper::getBackendTableManagerEditLink('rex_school', 'school/team/team'));

Helper::showBackendUserInstruction("Die empfangenen Nachrichten sind im Menüpunkt Schule > Posteingang.", Helper::getBackendTableManagerEditLink('rex_school_inbox', 'school/inbox'));

/** Variablen */
$modul = rex_var::toArray("REX_VALUE[1]");
$modul_yform = rex_var::toArray("REX_VALUE[2]");

/* Fragment */
$fragment = new Fragment();
$fragment->setVar('article_id', "REX_ARTICLE_ID");
$fragment->setVar('slice_id', "REX_SLICE_ID");

/* Ausgabe */
echo $fragment->parse('school/contact/index.php');

?>
