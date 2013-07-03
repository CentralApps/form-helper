<?php
namespace CentralApps\FormHelper\Data;

class FormDataGetterAccess extends FormData
{
	protected $prefixToRemove = '';

	public function setPrefixToRemove($prefix)
	{
		$this->prefixToRemove = $prefix;
	}

	public function hasData()
	{
		return is_object($this->data);
	}

	public function count()
	{
		throw new \Exception("Not implemented yet");
	}

	public function getDataForField($field)
	{
		$property = str_replace($this->prefix_to_remove, '', $field);
		$property = str_replace('_', ' ', $property);
		$property = ucwords($property);

		$method = 'get' . $property;

		return $this->data->$method();
	}

	public function hasDataForField($field)
	{
		$data = $this->getDataForField($field);

		if (is_null($data) || '' == $data) {
			return false;
		} else {
			return true;
		}
	}
}