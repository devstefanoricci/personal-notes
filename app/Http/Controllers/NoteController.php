<?php

namespace App\Http\Controllers;

use App\Models\Note as Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::latest()->with('user')->get();

        return $notes;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $max_size = (int) ini_get('upload_max_filesize') * 1000;

        $request->validate([
            'title' => 'string|required',
            'body'  => 'string|required',
            'image' => [
                'required',
                'file',
                'image',
                'max:' . $max_size,
            ]
        ]);

        $file = $request->file('image');

        //dd($request, $file);

        // Check if the file is valid
        if (!$request->file('image')->isValid()) {
            // Return success response
            return back()->with('error', 'File upload error')->with('image', $filePath);
        }

        // Store the file in the 'uploads' directory on the 'public' disk
        $filePath = $request->file('image')->store('uploads', 'public');

        $note = new Note();

        $note->title = $request->input('title');
        $note->body = $request->input('body');
        $note->image_url = $filePath;

        $note->user_id = auth()->user()->id;
        $note->save();

        return redirect()
                ->back()
                ->with('success','File has been uploaded.');

        // 	<img src="{{ Storage::disk('public')->url(session('file')) }}" alt="Uploaded File">
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $note = Note::with('user')->findOrFail($id);

        return view('notes.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $note = Note::with('user')->findOrFail($id);

        return view('notes.edit', $note);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $note = Note::findOrFail($id);

        $request->validate([
            'title' => 'string|required',
            'body'  => 'string|required'
        ]);

        $note->title = $request->input('title');
        $note->body = $request->input('body');
        $note->save();

        return redirect()->with('success', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $note = Note::findOrFail($id);

        $note->delete();

        return redirect()->with('success', 204);
    }
}
