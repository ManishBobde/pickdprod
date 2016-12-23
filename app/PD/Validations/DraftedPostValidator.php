<?php
/**
 * Created by PhpStorm.
 * User: Hash
 * Date: 14-01-2016
 * Time: 20:10
 */

namespace PD\Validations;


use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class DraftedPostValidator {

	use ValidatesRequests;

	public static $rules = [
		'title' => 'required',
	];

	public function validatePost(Request $request)
	{
		$validator = Validator::make($request->all(), static::$rules);

			if ($validator->fails())
			{
				throw new ValidationException($validator);
			}
		return true;
	}
}