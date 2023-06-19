<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = ['popularity'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}