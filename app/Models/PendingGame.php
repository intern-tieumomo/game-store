<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendingGame extends Model
{
    protected $fillable = [
    	'title', 'price', 'release_date', 'summary', 'features', 'requirement', 'publisher_id'
    ];

    public function publisher()
    {
    	return $this->belongsTo(Publisher::class);
    }
}
