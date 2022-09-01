<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationBanner extends Model
{
    use HasFactory;
    protected $fillable = [
	    'name',
	    'cat_image',
	    'lat',
    	'lon'
    ];
}
