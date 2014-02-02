<?php
namespace CentralApps\FormHelper\Errors;

class SymfonyValidatorViolationsAdapter extends FormErrors
{
	// TODO: need to consider violation loops e.g. invoice items in an invoice
	public function __construct($errors = null)
	{
		if (! is_null($errors)) {
			foreach ($errors as $violation) {
				$field = $this->getFieldNameFromPath($violation->getPropertyPath());
				$fields = explode('][', $field);
				$fields = array_reverse($fields);

				$this->errors = $this->pushError($this->errors, $fields, $violation);
			}
		}
	}

	protected function getFieldNameFromPath($path)
	{
		return preg_replace('/\[\s*(.+)\s*\]/', '$1', $path);
	}

	protected function pushError($errors, $keys, $violation)
	{
		$key = array_pop($keys);
		if (!array_key_exists($key, $errors)) {
			$errors[$key] = array();
		}

		if (count($keys) > 0) {
			$errors[$key] = $this->pushError($errors[$key], $keys, $violation);
		} else {
			$errors[$key][] = $violation->getMessage();
		}

		return $errors;
	}

}
