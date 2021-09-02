<?php

namespace App\Http\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Models\Note;

class NoteService
{
	public function index()
	{
		$notes = Note::select('title', 'content', 'slug', 'status', 'updated_at')
		                ->where('user_id', auth()->id())
		                ->orderByDesc('id')
		                ->paginate(10);

		return $notes;
	}

	public function create($request)
	{
		$slug = $this->createNewSlug();
		$user_id = $this->getUserId();

		$status = (int) $request->input('status', 1);
		$password = (string) $request->input('password');

		if ($user_id == 0 && $status == 2) $status = 1;
		if ($status !== 3) $password = null;
        
		$note = [
			'title' => (string) $request->input('title'),
			'content' => (string) $request->input('content'),
			'status' => $status,
			'password' => $password,
			'user_id' => $user_id,
			'slug' => $slug
		];

		try {
			Note::create($note);
			$request->session()->flash('slug', $slug);
		} catch (\Exception $error) {
            return false;
		}

		return true;
	}

	public function update($request, $note)
	{
		$note->title = (string) $request->input('title');
		$note->content = (string) $request->input('content');
		$note->status = (int) $request->input('status');
		$note->password = (string) $request->input('password');

		if ($note->status !== 3) $note->password = null;

		try {
			$note->save();
		} catch (\Exception $error) {
            return false;
		}

		return true;
	}

	public function destroy($note)
	{
		try {
			$note->delete();
		} catch (\Exception $error) {
            return false;
		}

		return true;
	}

	public function trash()
	{
		$notes = Note::select('title', 'content', 'slug', 'status', 'deleted_at')
		                ->where('user_id', auth()->id())
		                ->onlyTrashed()
		                ->orderByDesc('id')
		                ->paginate(10);

		return $notes;
	}

	public function restore($slug)
	{
		$note = Note::onlyTrashed()->where('user_id', auth()->id())->where('slug', $slug)->firstOrFail();
        
        try {
			$note->restore();
		} catch (\Exception $error) {
            return false;
		}

		return true;
	}

	public function forceDelete($slug)
	{
		$note = Note::onlyTrashed()->where('user_id', auth()->id())->where('slug', $slug)->firstOrFail();
        
        try {
			$note->forceDelete();
		} catch (\Exception $error) {
            return false;
		}

		return true;
	}

	public function emptyTrash($request)
	{
		if ($request) {
			$notes = Note::onlyTrashed()->where('user_id', auth()->id())->get();

			if (count($notes) == 0) return false;

			foreach ($notes as $note) {
				$this->forceDelete($note->slug);
			}

			return true;
		}

		return false;
	}

	public function checkPassword($request)
	{
		$slug = (string) $request->input('slug');
		$password = (string) $request->input('password');

		return Note::where(['slug' => $slug, 'password' => $password])->first();		
	}

	private function createNewSlug()
	{
		$slug = Str::random(8);
		$slug = Str::of($slug)->lower();

		$note = Note::where('slug', $slug)->first();

		if ($note) {
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