<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class WelcomeController extends Controller
{

	public function home(){

		if(Auth::check())
		{
    		return redirect('login');
		}
		return Redirect::route('login')->withInput()->with('flash_notification.message', 'Please Login to access restricted area.');
	}
    
}
