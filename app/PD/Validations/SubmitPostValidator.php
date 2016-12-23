<?php
/**
 * Created by PhpStorm.
 * User: Hash
 * Date: 14-01-2016
 * Time: 20:10
 */

namespace PD\Validations;


use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class SubmitPostValidator {

	public function validatePost(Request $request)
	{


		$rules = $this->getRules($request);

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails())
		{
			throw new ValidationException($validator);
		}

		return true;
	}

	private function getRules(Request $request)
	{
		switch ($request->method())
		{
			case 'GET':
			case 'DELETE':
			{
				return [];
			}
			case 'POST':
			{
				return [
					'title'       => 'required',
					'body'        => 'required',
					'sourceTitle' => 'required',
					'sourceUrl'   => 'required|url',
					'postType'    => 'required',
					'category'    => 'required',
				];
			}
			case 'PUT':
			case 'PATCH':
			{
				return [
					'title'       => 'required',
					'body'        => 'required',
					'sourceTitle' => 'required',
					'sourceUrl'   => 'required|url',
					'category'    => 'required',
					'reviewer'    => 'required',
				];
			}
			default:
				break;
		}
	}
}