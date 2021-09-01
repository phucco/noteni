<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Services\NoteService;
use App\Http\Requests\NoteStoreRequest;
use App\Http\Requests\NoteUpdateRequest;

use App\Models\Note;
use App\Models\User;

class NoteController extends Controller
{
    protected $noteService;

    public function __construct(NoteService $noteService)
    {
        $this->noteService = $noteService;
        
        $this->authorizeResource(Note::class);
    }

    public function index()
    {
        $notes = $this->noteService->index();

        return view('note.index', ['notes' => $notes]);
    }

    public function show(?User $user, Note $note)
    {
        if ($note->user_id === auth()->id()) return view('note.show', ['note' => $note]);

        if ($note->status === 3) return view('note.password', ['note' => $note]);

        return view('note.show', ['note' => $note]);
    }

    public function create()
    {
        return view('note.add');
    }

    public function store(NoteStoreRequest $request)
    {
        $result = $this->noteService->create($request);

        if ($result) return redirect()->route('notes.show', session('slug'))->with('status', 'Create note successfully!');

        return back()->withInput();
    }

    public function edit(Note $note)
    {
        return view('note.edit', ['note' => $note]);
    }

    public function update(NoteUpdateRequest $request, Note $note)
    {
        $result = $this->noteService->update($request, $note);

        if ($result) return redirect()->route('notes.show', $note->slug)->with('status', 'Update note successfully!');        

        return back()->withInput();
    }

    public function destroy(Note $note)
    {
        $result = $this->noteService->destroy($note);

        if ($result) return redirect()->route('notes.index')->with('status', 'Delete note successfully!');

        return back()->with('error', 'Please try again later.');
    }

    public function trash()
    {
        $notes = $this->noteService->trash();

        return view('note.trash', ['notes' => $notes]);
    }

    public function restore($slug)
    {
        $result = $this->noteService->restore($slug);

        if ($result) return redirect()->route('notes.index')->with('status', 'Restore note successfully!');

        return back()->with('error', 'Please try again later.');
    }

    public function forceDelete($slug)
    {
        $result = $this->noteService->forceDelete($slug);

        if ($result) return redirect()->route('notes.index')->with('status', 'Permanently delete note successfully!');

        return back()->with('error', 'Please try again later.');
    }

    public function emptyTrash(Request $request)
    {
        $result = $this->noteService->emptyTrash($request);

        if ($result) return redirect()->route('notes.index')->with('status', 'Empty trash bin successfully!');

        return back()->with('error', 'Please try again later.');
    }

    public function checkPassword(Request $request)
    {
        $result = $this->noteService->checkPassword($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'content' => $result->content
            ]);
        }

        return response()->json(['error' => true]);
    }
}
