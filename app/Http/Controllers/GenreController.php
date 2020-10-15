<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class GenreController extends Controller
{
    public function index(Request $request)
    {
    	$genres = Genre::all();
    	$data = $request->all();
    	
    	// if(!$request->has('id') || $request->id == 0) {
    	// 	$games = Game::orderBy('id', 'desc')->paginate(Config::get('number.games_per_page'));
    	// 	$currentGenre = "";
    	// } else {
    	// 	try{
    	// 		$currentGenre = Genre::findOrFail($request->id);
    	// 	} catch (ModelNotFoundException $e) {
    	// 		return redirect()->back();
    	// 	}
    		
    	// 	$games = $currentGenre->games()->paginate(Config::get('number.games_per_page'));
    	// }

    	if ($request->has('id') && $request->id !=0   ) {
    		$name = $request->name;

    		try{
    			$currentGenre = Genre::findOrFail($request->id);
    		} catch (ModelNotFoundException $e) {
    			return redirect()->back();
    		}

            $games = $currentGenre->games()->where('title', 'like', '%' . $name . '%');
    	} else {
    		$name = $request->name;

            $games = Game::where('title', 'like', '%' . $name . '%');
    		$currentGenre = "";
    	}

    	$sort = $request->sorting;
    	switch ($sort) {
			case Config::get('sort.atoz'):
				$games = $games->orderBy('title', 'asc')->paginate(Config::get('number.games_per_page'));
				break;
			
			case Config::get('sort.ztoa'):
				$games = $games->orderBy('title', 'desc')->paginate(Config::get('number.games_per_page'));
				break;

			case Config::get('sort.ltoh'):
				$games = $games->orderBy('price', 'asc')->paginate(Config::get('number.games_per_page'));
				break;

			case Config::get('sort.htol'):
				$games = $games->orderBy('price', 'desc')->paginate(Config::get('number.games_per_page'));
				break;

			default:
				$games = $games->orderBy('id', 'desc')->paginate(Config::get('number.games_per_page'));
				break;
		}

    	return view('genres', compact('games', 'data', 'genres', 'currentGenre'));
    }
}
