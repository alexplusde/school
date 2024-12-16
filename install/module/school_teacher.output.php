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
Helper::showBackendUserInstruction("Verwalte die Liste über den Menüpunkt Schule.", Helper::getBackendTableManagerEditLink('rex_school_team', 0, 'school/team/team'));

/* Fragment */
$fragment = new Fragment();
$fragment->setVar('slice_id', "REX_SLICE_ID");
$fragment->setVar('article_id', "REX_ARTICLE_ID");


/* Modulspezifische Variablen */
$fragment->setVar('medialist', "REX_MEDIALIST[1]");

/* Ausgabe */
echo $fragment->parse('school/team/index.php');

?>
