<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = [
        'coupon', 'title', 'description', 'start_date', 'end_date',
        'minimum_payment', 'discount', 'image_path', 'active'
    ];
}
