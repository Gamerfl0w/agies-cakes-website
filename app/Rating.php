<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'name', 'detail', 'star', 'product_name'
    ];
}
