<?php

namespace App\Http\Controllers\Notes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\NoteResource;
use App\Models\{Note, Subject};

class NoteController extends Controller
{
	public function index() 
	{
		$notes = Note::with('subject')->latest()->get();
		return NoteResource::collection($notes);
	}

	public function show(Note $note) 
	{
		return new NoteResource($note);
	}

	public function update(Note $note) 
	{
		request()->validate([
			'subjectId' => 'required',
			'title' => 'required',
			'description' => 'required',
		]);

		$subject = Subject::findOrFail(request('subject'));
		$note = $note->update([
			'subject_id'=> $subject->id,
			'title' => request('title'),
			'description' => request('description')
		]);

		return response()->json([
			'message' => 'Your Note was updated',
			'note' => $note,
		]);
	}

    public function store(Request $request) 
	{
		sleep(1);
		$request->validate([
			'subject_id' => 'required',
			'title' => 'required',
			'description' => 'required',
		]);
		
		$subject = Subject::findOrFail($request->subject_id);
		$note = Note::create([
			'subject_id'=> $subject->id,
			'title' => $request->title,
			'slug' => \Str::slug($request->title),
			'description' => $request->description
		]);

		return response()->json([
			'message' => 'Your Note was created',
			'note' => $note,
		]);
	}

	public function destroy(Note $note) 
	{
		$note->delete();
		return response()->json([
			'message' => 'Your Note was deleted',
		], 200);
	}
}
