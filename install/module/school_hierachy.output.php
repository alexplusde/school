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
Helper::showBackendUserInstruction("Verwalte den Geschäftsverteilungsplan über den Menüpunkt Schule.", Helper::getBackendTableManagerEditLink('rex_school_team_tag', 0,'school/team/category'));

/* Fragment */
$fragment = new Fragment();
$fragment->setVar('slice_id', "REX_SLICE_ID");
$fragment->setVar('article_id', "REX_ARTICLE_ID");


/* Ausgabe */
echo $fragment->parse('school/hierachy/index.php');

?>
