<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'order_id', 'user_id', 'bank', 'card_number', 'card_name',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function order() {
        return $this->belongsTo('App\Order');
    }
}
