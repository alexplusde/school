<?php

use Alexplusde\BS5\Fragment;
use Alexplusde\BS5\Helper;
use Alexplusde\School\Team;

use Url\Url;

$person;
$manager = Url::resolveCurrent();
if ($manager = Url::resolveCurrent()) {
    /** @var Team $person */
    $person = $manager->getDataset();
}

if ($person !== null) {
    ?>
    <section class="modul modul-team modul-person row" id="modul-REX_SLICE_ID">
    <?= Helper::getBackendEditLink("REX_ARTICLE_ID", null, "REX_SLICE_ID") ?>
        <div class="col-12 col-md-3">
            <?php
                $fragment = new Fragment;
    $fragment->setVar('person', $person);
    echo $fragment->parse("school/team/person-small.php"); ?>
        </div>
        <div class="col-12 col-md-9">
        <?php         #### Kontaktformular ####

        $yform = new rex_yform();
    $yform->setObjectparams('form_ytemplate', 'bootstrap5,bootstrap');
    $yform->setObjectparams('form_showformafterupdate', 0);
    $yform->setObjectparams('real_field_names', true);
    $yform->setObjectparams('form_name', 'yform-REX_SLICE_ID');
    $yform->setObjectparams('form_anchor', 'yform-REX_SLICE_ID');

    $yform->setObjectparams('form_action', rex_getUrl('', '', ['team-id' => $person->getId()]));

    $yform->setValueField('text', array("name", "Ihr Name"));
    $yform->setValueField('text', array("email", "Ihre E-Mail-Adresse"));
    $yform->setValidateField('empty', array("email", "Bitte geben Sie eine gültige E-Mail-Adresse an."));
    $yform->setValidateField('empty', array("name", "Bitte geben Sie einen Namen an."));
    $yform->setValueField('text', array("name_student", "Für Eltern: Name der Schülerin / des Schülers"));
    $yform->setValueField('text', array("class", "Klasse der Schülerin / des Schülers"));
    $yform->setValueField('text', array("phone", "Telefonnummer"));
    $yform->setValueField('textarea', array("message", "Nachricht"));
    $yform->setValueField('datestamp', array("createdate", "Zeitstempel Eintragung", "", "", "1"));
    $yform->setValueField('datestamp_auto_delete', ['deletedate', 'Löschdatum', 'Y-m-d H:i:s', '0', '0', '+6 months']);

    $yform->setValueField('spam_protection', array("honeypot", "Bitte nicht ausfüllen.", "Ihre Anfrage wurde als Spam erkannt und gelöscht. Bitte versuchen Sie es in einigen Minuten erneut oder wenden Sie sich persönlich an uns.", 0));

    $yform->setValueField('html', array("", "<p>Bitte beachten Sie, dass aus organisatorischen Gründen keine sofortige Zustellung erfolgt. In wichtigen Fällen, oder Anliegen, die eine Unterschrift benötigen (bspw. Anmeldungen, Entschuldigungen), reicht eine Kontaktaufnahme über dieses Formular nicht aus!</p>"));

    $yform->setActionField('tpl2email', array('school_contact_teacher_confirm', 'email', ''));
    $yform->setActionField('tpl2email', array('school_contact_teacher', '', $person->getEmail()));

    $yform->setActionField('db', array('rex_school_inbox'));
    $yform->setActionField('showtext', array("Vielen Dank für Ihre Nachricht. Bitte vergewissern Sie sich ggf. in ein paar Tagen persönlich, ob die Nachricht zugestellt wurde.", "", "", "1"));

    echo $yform->getForm();
    ?>
        
        </div>
    </section>
    <?php
}
?>
