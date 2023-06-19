<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $fillable = [
        'main', 'about', 'contacts', 'main_image', 'about_image', 'owner', 'contact_number', 'location'
    ];
}
