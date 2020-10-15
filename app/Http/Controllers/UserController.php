<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function becomePublisher()
    {
    	if (!Auth::check()) {
            return redirect()->back();
        } else {
        	if(Auth::user()->role != 1)
        		return redirect()->back();
        }

        return view('profile.become-publisher');
    }
}
