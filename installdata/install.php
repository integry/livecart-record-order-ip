<?php

ClassLoader::import('application.model.eav.EavField');

$field = EavField::getNewInstance('CustomerOrder');
$field->handle->set('ip');
$field->setValueByLang('name', null, 'IP Address');
$field->type->set(EavField::TYPE_TEXT_SIMPLE);
$field->dataType->set(EavField::DATATYPE_TEXT);
$field->isDisplayed->set(false);
$field->save();

?>