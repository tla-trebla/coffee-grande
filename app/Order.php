<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'order_number',
        'status', 'name',
        'address', 'phone',
        'delivery_method', 'delivery_cost',
        'discount', 'sub_total',
        'total', 'note', 'expired_date',
    ];

    public function products() {
        return $this->belongsToMany('App\Product');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function payment() {
        return $this->hasOne('App\Payment');
    }
}
