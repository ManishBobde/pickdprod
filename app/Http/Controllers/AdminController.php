<?php

namespace App\Http\Controllers;

use App\Exceptions\ResponseConstructor;
use App\Notifications\SendUserPasswordNotification;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;

use PD\Validations\UserValidator;

class AdminController extends Controller {

	protected $responseConstructor;

	private $userValidator;

	/**
	 * Create a new controller instance.
	 *
	 * @param ResponseConstructor $responseConstructor
	 * @param UserValidator $userValidator
	 */
	public function __construct(ResponseConstructor $responseConstructor, UserValidator $userValidator)
	{
		$this->middleware(['auth', 'role:admin']);
		$this->responseConstructor = $responseConstructor;
		$this->userValidator = $userValidator;
	}

	public function home()
	{

		$users = User::paginate(10);

		return view('admin.home')->with('users', $users);;

	}

	/**
	 * Give all the pickd users
	 *
	 */
	public function getAllUsers()
	{
		$users = User::paginate(5);

		return view('home')->with('users', $users);
	}

	/**
	 * Get the pickd user details
	 *
	 * @param $userId
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function getUserDetails($userId)
	{
		return view('home', ['user' => User::findOrfail($userId)]);
	}

	/**
	 * Add the user
	 * @param Request $request
	 * @return
	 */
	public function addUser(Request $request)
	{
		$userDetails = $request->all();

		if (!$this->userValidator->validate($userDetails))
		{

			return Redirect::back()->withErrors($this->userValidator->errors())->withInput();
		}

		$randomPassword = str_random(6);

		$user = new User;

		$user->userName = $request->firstName . " " . $request->lastName;

		$user->email = $request->email;

		$user->mobileNumber = "9999999999";

		$user->password = Hash::make($randomPassword);

		$user->save();

		$roles = Role::where('name', $request->role)
			->first();

		$user->roles()->attach($roles->id);

		$user->notify(new SendUserPasswordNotification($randomPassword));

		return redirect()->back()->with('flash_notification.message', 'User added successfully')
			->with('flash_notification.level', 'success');

	}

	/**
	 * Suspend the users
	 * @param Request $request
	 * @return
	 */
	public function suspendUsers(Request $request)
	{
		DB::table('users')
			->whereIn('id', $request->userIds)
			->update(['active' => 0]);

		return $this->responseConstructor->setResultCode(200)
			->setResultTitle(Success)
			->successResponse("Users Suspended Successfully");
	}

	/**
	 * Resume the users
	 * @param Request $request
	 * @return
	 */
	public function resumeUsers(Request $request)
	{
		DB::table('users')
			->whereIn('id', $request->userIds)
			->update(['active' => 1]);

		return $this->responseConstructor->setResultCode(200)
			->setResultTitle(Success)
			->successResponse("Users Resumed Successfully");
	}

	/**
	 * Delete the users
	 * @param Request $request
	 * @return
	 */
	public function deleteUsers(Request $request)
	{
		DB::table('users')
			->whereIn('id', $request->userIds)
			->delete();

		return $this->responseConstructor->setResultCode(200)
			->setResultTitle(Success)
			->successResponse("Users Deleted Successfully");
	}

	/**
	 * Modify the user
	 * @param Request $request
	 * @param $userId
	 * @return \Illuminate\Http\Response
	 */
	public function modifyUser(Request $request, $userId)
	{

		$user = User::findOrFail($userId);
		if (!is_null($user))
		{

			$user->fill($request->all());

			$user->save();

			return $this->responseConstructor
				->setResultCode(200)
				->setResultTitle("User details changed")
				->successResponse("User details changed");
		} else
		{

			return $this->responseConstructor
				->setResultCode(404)
				->setResultTitle("User does not exist")
				->respondWithError("User does not exist");
		}
	}

	/**
	 * Reset User Password
	 * @param Request $request
	 * @param $userId
	 * @return \Illuminate\Http\Response
	 */
	public function resetUserPassword(Request $request, $userId)
	{

		$newpassword = $request->get('resetPasswordTo');

		$user = User::findOrFail($userId);
		if (!is_null($user))
		{

			$user->password = Hash::make($newpassword);

			$user->save();

			return $this->responseConstructor
				->setResultCode(200)
				->setResultTitle("Password changed")
				->successResponse("Password changed");
		} else
		{

			return $this->responseConstructor
				->setResultCode(404)
				->setResultTitle("User does not exist")
				->respondWithError("User does not exist");
		}
	}

}
