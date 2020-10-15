<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment(Request $request)
    {
    	$comment = Comment::create([
    		'comment' => $request->comment,
    		'post_id' => $request->post_id,
    		'account_id' => Auth::id(),
    	]);

    	$result = [
    		'id' => $comment->id,
    		'email' => $comment->account->email,
    		'updated_at' => date('Y-m-d H:i:s', strtotime($comment->updated_at)),
    		'comment' => $comment->comment,
    	];

    	return $result;
    }

    public function destroy($id)
    {
    	Comment::destroy($id);

    	return "Comment has been Deleted!";
    }

    public function update(Request $request)
    {
    	$comment = Comment::find($request->id)->update([
    		'comment' => $request->comment,
    	]);

    	$result = [
    		"comment" => $request->comment,
    		"text" => "Comment has been Updated!",
    	];

    	return $result;
    }
}
