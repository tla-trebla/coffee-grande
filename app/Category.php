<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'description', 'image_path', 'active'
    ];

    public function products() {
        return $this->hasMany('App\Product');
    }
}
