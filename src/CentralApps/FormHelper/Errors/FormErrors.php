<?php
namespace CentralApps\FormHelper\Errors;

class FormErrors implements \Countable
{
	protected $errors = array();

	public function __construct($errors = null)
	{
		if (!is_null($errors)) {
			$this->errors = $errors;
		}
	}

	public function hasErrors()
	{
		return $this->count();
	}

	public function count()
	{
		return count($this->errors);
	}

	public function getErrorsForField($field)
	{
		if (array_key_exists($field, $this->errors)) {
			if (is_array($this->errors[$field])) {
				return $this->errors[$field];
			} else {
				return array($this->errors[$field]);
			}
		}
	}

	public function hasErrorsForField($field)
	{
		if (array_key_exists($field, $this->errors)) {
			return true;
		}

		return false;
	}
}