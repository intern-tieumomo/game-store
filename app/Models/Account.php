<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Account extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    use Notifiable;

    protected $fillable = [
    	'email',
        'password',
        'role',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function user()
    {
    	return $this->hasOne(User::class);
    }

    public function publisher()
    {
    	return $this->hasOne(Publisher::class);
    }

    public function payments()
    {
    	return $this->hasMany(Payment::class);
    }

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
