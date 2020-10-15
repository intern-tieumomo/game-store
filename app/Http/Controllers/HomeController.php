<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $featuredGames = Game::orderBy('id', 'desc')->limit(8)->get();
        $newGames = Game::orderBy('id', 'desc')->limit(3)->get();

    	return view('home', compact('featuredGames', 'newGames'));
    }

    public function changeLanguage($lang)
    {
        Session::put('lang', $lang);
    	        
        return redirect()->back();
    }
}
