<?php

$addon = rex_addon::get('school');

$form = rex_config_form::factory($addon->name);

$field = $form->addInputField('text', 'editor', null, ['class' => 'form-control']);
$field->setLabel(rex_i18n::msg('school_editor'));
$field->setNotice('z.B. <code>class="form-control redactor-editor--text"</code> oder <code>class="form-control cke5-editor" data-profile="default" data-lang="de"</code>');

$fragment = new rex_fragment();
$fragment->setVar('class', 'edit', false);
$fragment->setVar('title', $addon->i18n('school_settings'), false);
$fragment->setVar('body', $form->get(), false);
echo $fragment->parse('core/page/section.php');
