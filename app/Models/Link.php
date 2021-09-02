<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'destination',
        'user_id',
        'times'
    ];
    
    public function getRouteKeyName()
	{
	    return 'slug';
	}
}
