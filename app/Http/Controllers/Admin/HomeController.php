<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\PendingGame;

class HomeController extends Controller
{
    public function index()
    {
        $numberPendingGame = PendingGame::all()->count();
        $numberPublisherRequest = Account::where('role', 5)->count();

        return view('admin.home', compact('numberPendingGame', 'numberPublisherRequest'));
    }
}
