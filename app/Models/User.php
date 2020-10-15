<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name', 'birthday', 'address', 'phone', 'account_id'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
