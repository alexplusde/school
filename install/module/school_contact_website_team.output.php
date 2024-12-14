<section class="modul modul-mail" id="modul-REX_SLICE_ID">
	<div class="mail-wrapper">
		<?php
        $yform = new rex_yform();
		$yform->setObjectparams('form_ytemplate', 'bootstrap5,bootstrap');
		$yform->setObjectparams('form_showformafterupdate', 0);
		$yform->setObjectparams('form_anchor', 'modul-REX_SLICE_ID');
		$yform->setObjectparams('form_name', 'table-rex_yf_school_message');
		$yform->setObjectparams('form_action', rex_getUrl('REX_ARTICLE_ID'));
		$yform->setObjectparams('real_field_names', true);


		$yform->setValueField('text', array("firstname","Vorname *"));
		$yform->setValidateField('empty', array("firstname","Bitte geben Sie einen Vornamen an."));
		$yform->setValueField('text', array("lastname","Nachname *"));
		$yform->setValidateField('empty', array("lastname","Bitte geben Sie einen Nachnamen an."));
		$yform->setValueField('text', array("phone","Telefonnummer"));
		$yform->setValueField('textarea', array("message","Nachricht"));
		$yform->setValueField('text', array("email","E-Mail-Adresse *"));
		$yform->setValidateField('empty', array("email","Bitte geben Sie eine gültige E-Mail-Adresse an."));
		$yform->setValueField('datestamp', array("createdate","Zeitstempel Eintragung","mysql","","1"));
		$yform->setValueField('datestamp_auto_delete', ['deletedate','Löschdatum','Y-m-d H:i:s','0','0','+6 months']);

		$yform->setValueField('upload', array('upload','Dateianhang','100,10000','.pdf,.odt,.doc,.docx,.xls,.xlsx,.png,.jpg,.jpeg,.zip'));

		$yform->setValueField('php', array('php_attach','Datei anhängen','<?php if (isset($this->params[\'value_pool\'][\'files\'])) { $this->params[\'value_pool\'][\'email_attachments\'] = $this->params[\'value_pool\'][\'files\']; } ?>'));

		$yform->setValueField('spam_protection', array("honeypot","Bitte nicht ausfüllen.","Ihre Anfrage wurde als Spam erkannt und gelöscht. Bitte versuchen Sie es in einigen Minuten erneut oder wenden Sie sich persönlich an uns.", 0));


		$yform->setActionField('tpl2email', array('school_contact_confirm', 'email'));
		$yform->setActionField('tpl2email', array('school_contact', 'lea.schweigardt@elly-hn.de'));
		$yform->setActionField('db', array('rex_school_inbox'));


		echo $yform->getForm();
		?>
	</div>
</section>
