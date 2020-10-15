<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Genre;
use App\Models\Payment;
use App\Models\PaymentDetail;
use App\Models\Review;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class GameController extends Controller
{
    public function index(Request $request)
    {
        $genres = Genre::all();
    	$games = Game::orderBy('id', 'desc')->paginate(Config::get('number.games_per_page'));
    	$data = $request->all();

    	if ($request->has('name') || $request->has('sorting')) {
    		$name = $request->name;
    		$sort = $request->sorting;

            $games = Game::where('title', 'like', '%' . $name . '%');

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
    	}

    	return view('games', compact('games', 'data', 'genres'));
    }

    public function gameDetail(Request $request)
    {
        if ($request->missing('id')) {
            return redirect()->back();
        }

        try {
            $game = Game::with('genres')->findOrFail($request->id);
        } catch (ModelNotFoundException $e) {
            return redirect()->back();
        }
        
        $genreIds = $game->genres->pluck('id')->toArray();
        $relatedGames = Game::whereHas('genres', function($query) use ($genreIds) {
            return $query->whereIn('genres.id', $genreIds);
        })->where('id', '!=', $game->id)->limit(8)->get();
        $review = Review::where('game_id', $game->id)->where('account_id', Auth::id())->first();
        $listReview = Review::where('game_id', $game->id)->orderBy('rating', 'desc')->limit(2)->get();

        return view('game-detail', compact('game', 'relatedGames', 'review', 'listReview'));
    }

    public function download()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('download');
    }

    public function owned()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $ownedGames = PaymentDetail::where('account_id', Auth::id())->orderBy('id', 'desc')->get();

        return view('profile.owned-games', compact('ownedGames'));
    }

    public function searchOwnedGames(Request $request)
    {
        if(!Auth::check()) {
            return "isNotLogin";
        }

        $name = $request->name;
        $gameIds = Game::where('title', 'like', '%' . $name . '%')->pluck('id')->toArray();
        $paymentDetails = PaymentDetail::where('account_id', Auth::id())->whereIn('game_id', $gameIds)->get();
        if (count($paymentDetails) == 0) {
            $result = "<i>No game found!</i>";

            return $result;
        } else {
            $result = "";
            foreach($paymentDetails as $paymentDetail) {
                $result .= "<a href='" . route('games.detail', ['id' => $paymentDetail->game_id]) . "'><i class='fa fa-gamepad' aria-hidden='true'></i> " . $paymentDetail->game->title . "</a> - ";
                $result .= "<a href=''> <i><i class='fa fa-download' aria-hidden='true'></i> Download</i> ";
                $result .= "</a><br>";
            }

            return $result;
        }
    }
}
