<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'name', 'description', 'price', 'image_path', 'active',
    ];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function orders() {
        return $this->belongsToMany('App\Order');
    }

    public function reviews() {
        return $this->hasMany('App\Review');
    }
}
