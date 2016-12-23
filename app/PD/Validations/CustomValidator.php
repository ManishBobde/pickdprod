<?php


namespace PD\Validations;


use Illuminate\Validation\Validator;

class CustomValidator extends Validator {

	public function validateYouTubeUrl($attribute, $value, $parameters)
	{
		$pattern = "#^https?://([a-z0-9-]+\.)*youtube\.com(/.*)?$#";
		return !! preg_match($pattern, $value);
	}

}