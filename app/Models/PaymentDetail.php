<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    protected $fillable = [
    	'game_id', 'quantity', 'subtotal', 'payment_id', 'account_id',
    ];

    public function game()
    {
    	return $this->belongsTo(Game::class);
    }

    public function payment()
    {
    	return $this->belongsTo(Payment::class);
    }
}
