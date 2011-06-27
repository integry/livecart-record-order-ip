<?php

/**
 * @author Integry Systems
 */
class RegisterOrderIP extends ControllerPlugin
{
	public function process()
	{
		$session = new Session();
		$id = $session->get('completedOrderID');

		if (!$id)
		{
			return;
		}

		$order = CustomerOrder::getInstanceByID($id);

		foreach (EavField::getFieldsByClass('CustomerOrder') as $field)
		{
			if ($field->handle->get() == 'ip')
			{
				$found = $field;
				break;
			}
		}

		if (!isset($found))
		{
			return;
		}

		$order->getSpecification()->setAttributeValueByLang($found, null, $this->request->getIP());
		$order->getSpecification()->save();
	}
}

?>