<?php
namespace CentralApps\FormHelper\Errors;

class SymfonyValidatorViolationsAdapter extends FormErrors
{
	// TODO: need to consider violation loops e.g. invoice items in an invoice
	public function __construct($errors = null)
	{
		foreach ($errors as $violation) {
			$field = $this->getFieldNameFromPath($violation->getPropertyPath());
			if (!array_key_exists($field, $errors)) {
    			$this->errors[$field] = array();
    		}

    		$this->errors[$field][] = $violation->getMessage();
		}
	}

	protected function getFieldNameFromPath($path)
	{
		return preg_replace('/\[\s*(.+)\s*\]/', '$1', $path);
	}

}