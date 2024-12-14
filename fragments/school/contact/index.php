<?php

namespace Alexplusde\School;

use Alexplusde\BS5\Helper;

/** @var rex_fragment $this */

$module = $this->getVar('module');
$modul_yform = $this->getVar('modul_yform');

?>
<section class="position-relative" id="modul-contact-form">

<?php

$yform = new \rex_yform();
$yform->setObjectparams('form_ytemplate', 'bootstrap');
$yform->setObjectparams('form_showformafterupdate', 0);
$yform->setObjectparams('real_field_names', true);
$yform->setObjectparams('form_name', 'yform-modul-<?php echo $module->getId(); ?>');
$yform->setObjectparams('form_anchor', 'modul-contact-from');

$yform->setObjectparams('form_action', rex_getUrl('REX_ARTICLE_ID'));

$yform->setValueField('text', array("firstname","Vorname"));
$yform->setValidateField('empty', array("firstname","Bitte geben Sie einen Vornamen an."));
$yform->setValueField('text', array("lastname","Nachname"));
$yform->setValidateField('empty', array("lastname","Bitte geben Sie einen Nachnamen an."));
$yform->setValueField('text', array("phone","Telefonnummer"));
$yform->setValueField('textarea', array("message","Nachricht"));
$yform->setValueField('text', array("email","E-Mail-Adresse"));
$yform->setValidateField('empty', array("email","Bitte geben Sie eine gültige E-Mail-Adresse an."));
$yform->setValueField('datestamp', array("createdate","Zeitstempel Eintragung","","","1"));
$yform->setValueField('datestamp_auto_delete', ['deletedate','Löschdatum','Y-m-d H:i:s','0','0','+6 months']);

$yform->setValueField('spam_protection', array("honeypot","Bitte nicht ausfüllen.","Ihre Anfrage wurde als Spam erkannt und gelöscht. Bitte versuchen Sie es in einigen Minuten erneut oder wenden Sie sich persönlich an uns.", 0));


$yform->setActionField('tpl2email', array('school_contact_confirm', 'email'));
$yform->setActionField('tpl2email', array('school_contact', 'verwaltung@ehkg-hn.de'));


$yform->setActionField('db', array('rex_school_inbox'));
$yform->setActionField('showtext', array($modul_yform['success'], "", "", "1"));

echo $yform->getForm();
?>
</section>
