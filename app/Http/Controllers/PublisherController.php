<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublishGameRequest;
use App\Models\PendingGame;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublisherController extends Controller
{
    public function index()
    {
    	return view('profile.publish-game');
    }

    public function publish(PublishGameRequest $request)
    {
		$pendingGame = PendingGame::create([
			'title' => $request->title,
			'price' => $request->price,
			'release_date' => $request->release_date,
			'summary' => $request->summary,
			'features' => $request->features,
			'requirement' => $request->requirement,
			'publisher_id' => Auth::user()->publisher->id,
		]);

		$request->preview->move('client/images/pending_games/' . $pendingGame->id, 'preview.jpg');
		$request->detail_1->move('client/images/pending_games/' . $pendingGame->id, 'detail-1.jpg');
		$request->detail_2->move('client/images/pending_games/' . $pendingGame->id, 'detail-2.jpg');
		$request->detail_3->move('client/images/pending_games/' . $pendingGame->id, 'detail-3.jpg');

		return "Publish request sent success!";
    }

    public function createPost(Request $request)
    {
    	return view('profile.create-post');
    }

    public function storePost(Request $request)
    {
    	$blog = Post::create([
            'title' => $request->title,
            'summary' => $request->summary,
            'content' => $request->content,
            'release_date' => Carbon::now(),
            'account_id' => Auth::id(),
        ]);

        $request->preview->move('client/images/blogs/' . $blog->id, 'preview.jpg');

        $result = [
            'id' => $blog->id,
            'message' => 'Your post has been Publish! View this Post?'
        ];

        return $result;
    }
}
