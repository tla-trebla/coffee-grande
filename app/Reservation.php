<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id', 'reservation_number', 'name', 'phone', 'email', 'date', 'time', 'description', 'status',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
