<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait MultiTenantModelTrait {
	public static function bootMultiTenantModelTrait()
	{		
		static::creating(function ($model) {
			if (auth()->check()) {
				$model->user_id = auth()->id();
			} else {
				$model->user_id = 0;
			}			
			$model->slug = strtolower(Str::random(8));
		});
	}

	public function getRouteKeyNameMultiTenantModelTrait()
	{
		return 'slug';
	}
}