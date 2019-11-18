<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = [
        'product_id', 'name', 'price', 'active',
    ];

    public function product() {
        return $this->belongsTo('App\Product');
    }
}
