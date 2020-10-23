<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
    	'title', 'summary', 'content', 'release_date', 'account_id'
    ];

    public function account()
    {
    	return $this->belongsTo(Account::class);
    }

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }
}
