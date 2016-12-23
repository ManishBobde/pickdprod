<?php

namespace App\Http\Controllers;

use App\Category;
use App\ContentState;

use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{


	public function getAllCategories(){

		$categories = Category::all(['id', 'categoryName']);

		return response()->json($categories);
	}

	public function getAllPostStates(){

		$states = ContentState::all(['id', 'stateLabel']);

		return response()->json($states);

	}

	public function getAllReviewers(){

		$users = DB::table('users')
			->join('role_user', 'users.id', '=', 'role_user.user_id')
			->join('roles', 'role_user.role_id', '=', 'roles.id')
			->where('roles.id','3')
			->select('users.id', 'users.userName')
			->get();

		return response()->json($users->toArray());

	}

}
