<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
    	'account_id', 'payment_date', 'amount'
    ];

    public function paymentDetails()
    {
    	return $this->hasMany(PaymentDetail::class);
    }

    public function account()
    {
    	return $this->belongsTo(Account::class);
    }
}
