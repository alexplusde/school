<?php

use Alexplusde\BS5\Fragment;
use Alexplusde\BS5\Helper;
use Url\Url;

/* Benötigte Addons */
$requiredAddons = ['yform', 'school'];
if (!Helper::packageExists($requiredAddons)) {
    echo rex_view::error(rex_i18n::rawMsg('bs5_missing_addon', implode(', ', $requiredAddons)));
    return;
};

/* Fragment */
$fragment = new Fragment();
$fragment->setVar('slice_id', "REX_SLICE_ID");
$fragment->setVar('article_id', "REX_ARTICLE_ID");

/* Modulspezifische Variablen */

/* Ausgabe */
$project = null;
$manager = Url::resolveCurrent();
if ($manager = Url::resolveCurrent()) {
    $project = $manager->getDataset();
}

if (!$project) {
    return;
}

$fragment = new Fragment();
$fragment->setVar('project', $project);
echo $fragment->parse('school/project/index.php');

?>
