<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublisherProfileRequest;
use App\Http\Requests\UserProfileRequest;
use App\Models\Account;
use App\Models\Game;
use App\Models\Payment;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
	public function index()
	{
		if (Auth::check()) {
			if (Auth::user()->role == Config::get('role.user')) {
				$user = Auth::user()->user;
				if ($user == null)
					$user = new User();

				$payments = Payment::where('account_id', Auth::id())->orderBy('id', 'desc')->paginate(4);

				return view('profile', compact('user', 'payments'));
			} else {
				$publisher = Auth::user()->publisher;
				if ($publisher == null)
					$publisher = new Publisher();

				$publishes = Game::where('publisher_id', Auth::id())->orderBy('id', 'desc')->paginate(4);

				return view('profile', compact('publisher', 'publishes'));
			}
		} else {
			return redirect()->route('login');
		}
	}

	public function updateUser(UserProfileRequest $request)
	{
		$user = User::updateOrCreate(
			['account_id' => Auth::id()],
			$request->all()
		);

		return "success";
	}

	public function updatePublisher(PublisherProfileRequest $request)
	{
		$publisher = Publisher::updateOrCreate(
			['account_id' => Auth::id()],
			$request->all()
		);

		return "success";
	}

	public function changePassword(Request $request)
	{
		if(Hash::check($request->current_password, Auth::user()->password) && $request->new_password == $request->confirm_new_password) {
			Account::find(Auth::id())->update(['password' => bcrypt($request->new_password)]);

			return "Password has been changed!";
		} else {
			return "Fail!";
		}
	}
}
