<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}


	/**
	 * Method for getting the profile details
	 */
	public function getProfileDetails($userId)
	{
		return view('userprofile', ['user' => User::findOrfail($userId)]);

	}


	/**
	 * Method for setting the profile details
	 * @param Request $request
	 * @param $userId
	 */
	public function setProfileDetails(Request $request, $userId)
	{

		$user = new User();

		$user->fullName = $request->fullName;

		$user->age = $request->age;

		$user->age = $request->sex;

		$user->mobileNumber = $request->mobileNumber;

		if ($request->hasFile('profilePic'))
		{

			$file = $request->file("profilePic");
			$name = time() . '-' . $file->getClientOriginalName();
			$file->move('uploads/profilePics', $name);
			$user->profilePicUrl = $name;
			//dd( $model->avatarUrl);
		}

		$user->save();

		return redirect()->back()->with('flash_notification.message', 'Profile Updated successfully')
			->with('flash_notification.level', 'success');

	}

	/**
	 * Method for changing the password
	 * @param Request $request
	 * @param $userId
	 * @return \Illuminate\Http\Response
	 */
	public function setPassword(Request $request, $userId)
	{

		$oldpassword = $request->get('oldPassword');

		$user = User::findOrFail($userId);

		if (!is_null($user))
		{

			if (Hash::check($oldpassword, $user->password))
			{

				$newpassword = $request->get('newPassword');

				$user->password = Hash::make($newpassword);

				$user->save();

				return redirect()->back()->with('flash_notification.message', 'Password changed successfully')
					->with('flash_notification.level', 'success');
			} else
			{
				return redirect()->back()->with('flash_notification.message', 'Old Password did not match')
					->with('flash_notification.level', 'error');
			}
		} else
		{
			return redirect()->back()->with('flash_notification.message', 'User does not exist')
				->with('flash_notification.level', 'error');
		}
	}

	/**
	 * Method for changing the password
	 * @param Request $request
	 * @param $userId
	 * @return \Illuminate\Http\Response
	 */
	public function changePassword()
	{

		return view("changepassword");
	}

}
