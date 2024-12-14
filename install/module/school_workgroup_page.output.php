<?php

use Url\Url;

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
