<?php
namespace CentralApps\FormHelper\Data;

class FormData implements \Countable
{
	protected $data = array();

	public function __construct($data = null)
	{
		if (!is_null($data)) {
			$this->data = $data;
		}
	}

	public function hasData()
	{
		return $this->count();
	}

	public function count()
	{
		return count($this->data);
	}

	public function getDataForField($field)
	{
		if (array_key_exists($field, $this->data)) {
			return $this->data[$field];
		}

		return '';
	}

	public function hasDataForField($field)
	{
		if (array_key_exists($field, $this->data) && $this->data['field'] != null) {
			return true;
		}

		return false;
	}

}