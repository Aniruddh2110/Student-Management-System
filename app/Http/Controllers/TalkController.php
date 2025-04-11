<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TalkController extends Controller
{
    // Show all talks
    public function index()
    {
        $talks = DB::select("SELECT * FROM talks ORDER BY created_at DESC");
        return view('talk.index', compact('talks'));
    }

    // Show form to create a talk
    public function create()
    {
        return view('talk.create');
    }

    // Store new talk
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string',
            'speaker' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
            'venue' => 'required|string',
        ]);
    
        DB::insert("INSERT INTO talks (title, speaker, date, time, venue, created_at, updated_at) VALUES (?, ?, ?, ?, ?, NOW(), NOW())", [
            $request->title,
            $request->speaker,
            $request->date,
            $request->time,
            $request->venue
        ]);
        

        return redirect()->route('talk.index')->with('success', 'Talk created!');
    }

    // Show form to edit a talk
    public function edit($id)
    {
        $talk = DB::selectOne("SELECT * FROM talks WHERE id = ?", [$id]);
        return view('talk.edit', compact('talk'));
    }

// Update a talk
    public function update(Request $request, $id)
    {
        DB::update("UPDATE talks SET title = ?, speaker = ?, date = ?, time = ?, venue = ?, updated_at = NOW() WHERE id = ?", [
            $request->title,
            $request->speaker,
            $request->date,
            $request->time,
            $request->venue,
            $id
        ]);
        return redirect()->route('talk.index')->with('success', 'Talk updated!');
    }

    // Delete a talk
    public function destroy($id)
    {
        DB::delete("DELETE FROM talks WHERE id = ?", [$id]);
        return redirect()->route('talk.index')->with('success', 'Talk deleted!');
    }
}
