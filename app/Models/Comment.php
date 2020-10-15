<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
    	'comment', 'account_id', 'post_id'
    ];

    public function post()
    {
    	return $this->belongsTo(Post::class);
    }

    public function account()
    {
    	return $this->belongsTo(Account::class);
    }
}
