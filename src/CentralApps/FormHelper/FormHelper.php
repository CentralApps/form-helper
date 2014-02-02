<?php
namespace CentralApps\FormHelper;

class FormHelper
{
	protected $data = null;
	protected $errors = null;

	public function __construct(Data\FormData $data=null, Errors\FormErrors $errors=null)
	{
		$this->data = $data;
		$this->errors = $errors;
	}

	public function setData(Data\FormData $form_data)
	{
		$this->data = $form_data;
	}

	public function setErrors(Errors\FormErrors $errors)
	{
		$this->errors = $errors;
	}

	public function hasErrors()
	{
		return (count($this->errors) > 0);
	}

	public function hasData()
	{
		return (count($this->data) > 0);
	}

	public function fieldHasErrors($field)
	{
		if (is_null($this->errors)) {
			return false;
		}

		return $this->errors->hasErrorsForField($field);
	}

	public function getErrorsForField($field)
	{
		if (is_null($this->errors)) {
			return array();
		}

		return $this->errors->getErrorsForField($field);
	}

	public function fieldHasData($field)
	{
		if (is_null($this->data)) {
			return false;
		}

		return $this->data->hasDataForField($field);
	}

	public function getDataForField($field)
	{
		if (is_null($this->data)) {
			return '';
		}

		return $this->data->getDataForField($field);
	}
}
