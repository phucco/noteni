<?php

namespace App\Http\Services;

use App\Models\Link;

class LinkService
{
	public function create($request)
	{	
		try {
			$result = Link::create(['destination' => $request->input('destination')]);
			$request->session()->flash('slug', $result->slug);
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
}