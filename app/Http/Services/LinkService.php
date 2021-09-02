<?php

namespace App\Http\Services;

use Illuminate\Support\Str;
use App\Models\Link;

class LinkService
{
	public function create($request)
	{	
		$destination = $request->input('destination');
		$slug = $this->createNewSlug();
		$user_id = $this->getUserId();

		try {
			Link::create(['slug' => $slug, 'destination' => $destination, 'user_id' => $user_id]);
			$request->session()->flash('slug', $slug);
		} catch (\Exception $error) {
			return false;
		}

		return true;
	}

	public function update($link)
	{
		try {
			$link->times = $link->times + 1;
            $link->save();
		} catch (\Exception $error) {
			return false;
		}

		return true;		
	}

    private function createNewSlug()
	{
		$slug = Str::random(8);
		$slug = Str::of($slug)->lower();

		if (Link::where('slug', $slug)->exists()) {
			$slug = self::createNewSlug();
		}

		return $slug;
	}

	private function getUserId()
	{
		if (auth()->check()) {
        	$user_id = auth()->id();
        } else {
        	$user_id = 0;
        }

        return $user_id;
	}
}