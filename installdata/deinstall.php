<?php

ClassLoader::import('application.model.eav.EavField');

foreach (EavField::getFieldsByClass('CustomerOrder') as $field)
{
	if ($field->handle->get() == 'ip')
	{
		$field->delete();
		break;
	}
}

?>