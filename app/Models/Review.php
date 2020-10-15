<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
    	'review',
        'rating',
        'account_id',
        'game_id',
    ];

    public function game()
    {
    	return $this->belongsTo(Game::class);
    }

    public function account()
    {
    	return $this->belongsTo(Account::class);
    }
}
