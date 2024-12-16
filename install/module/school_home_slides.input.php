<?php

use Alexplusde\BS5\Helper;
use FriendsOfRedaxo\MForm;


$requiredAddons = ['school', 'mform'];
if (!Helper::packageExists($requiredAddons)) {
    echo rex_view::error(rex_i18n::rawMsg('bs5_missing_addon', implode(', ', $requiredAddons)));
    return;
};

Helper::showBackendUserInstruction("Dieses Modul wird aktuell überarbeitet, daher gibt es keine Slideshow mehr.");


$mform1 = new MForm();
$mform1->addFieldsetArea('Folie');
$mform1->addInputField("text", "1.0.title", array('label'=>'Titel'));
$mform1->addTextAreaField("1.0.content", array('label'=>'Teaser','class'=>'form-control redactor-editor--text'));
$mform1->addLinkField("1", array('label'=>'Link zu'));
$mform1->addMediaField("1", array('label'=>'Bild'));

echo MBlock::show(1, $mform1->show(), array('min'=>1,'max'=>20));
