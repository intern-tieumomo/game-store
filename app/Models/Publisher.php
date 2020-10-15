<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $fillable = [
    	'name', 'address', 'phone', 'account_id'
    ];

    public function games()
    {
    	return $this->hasMany(Game::class);
    }

    public function pendingGames()
    {
        return $this->hasMany(PendingGame::class);
    }

    public function account()
    {
    	return $this->belongsTo(Account::class);
    }
}
