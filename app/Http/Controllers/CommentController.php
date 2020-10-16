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
            'ph' => trans('text.blog-detail.comment_ph'),
            'modal-title' => trans('text.blog-detail.update'),
            'delete' => trans('text.blog-detail.delete'),
            'save' => trans('text.blog-detail.save'),
    	];

    	return $result;
    }

    public function destroy($id)
    {
    	Comment::destroy($id);

    	return trans('text.blog-detail.delete-message');
    }

    public function update(Request $request)
    {
    	$comment = Comment::find($request->id)->update([
    		'comment' => $request->comment,
    	]);

    	$result = [
    		"comment" => $request->comment,
    		"text" => trans('text.blog-detail.update-message'),
    	];

    	return $result;
    }
}
