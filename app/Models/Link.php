<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\MultiTenantModelTrait;

class Link extends Model
{
    use HasFactory;
    use MultiTenantModelTrait;

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