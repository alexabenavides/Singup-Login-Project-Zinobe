<?php

namespace App\Entities;

use Illuminate\Translation\ArrayLoader;
use Illuminate\Translation\Translator;
use Illuminate\Validation\Factory as ValidatorFactory;


/**
 * Validation service
 */
class Validator
{
	public function __construct()
	{

	}

	public static function validateArray(array $source, array $rules, array $messages)
	{
		$translator       = new Translator(new ArrayLoader(), 'es_CO');
		$validatorFactory = new ValidatorFactory($translator);

		$validator = $validatorFactory->make($source, $rules, $messages);
		if ($validator->fails()) {
			return $validator->errors()->all();
		} else {
			return true;
		}
	}
}
