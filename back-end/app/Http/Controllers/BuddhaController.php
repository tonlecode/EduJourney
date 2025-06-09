<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buddha;
use Illuminate\Support\Str;

class BuddhaController extends Controller
{
    public function index()
    {
        return Buddha::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            // 'id' => 'required|string',
            'youtubeLink' => 'required|url',
            'name' => 'required|string',
            'date' => 'required|date',
        ]);

        Buddha::create([
            'id_code' => Str::uuid(),
            'youtube_link' => $validated['youtubeLink'],
            'name' => $validated['name'],
            'date' => $validated['date'],
        ]);

        return redirect('/postContent/buddha')->with('success', 'Data saved successfully!');
    }

    public function edit($id)
    {
        $buddha = Buddha::findOrFail($id);
        return view('postContent.buddhas.editBuddha', compact('buddha'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'youtubeLink' => 'required|url',
            'name' => 'required|string',
            'date' => 'required|date',
        ]);

        $buddha = Buddha::findOrFail($id);
        $buddha->update([
            'youtube_link' => $validated['youtubeLink'],
            'name' => $validated['name'],
            'date' => $validated['date'],
        ]);

        return redirect('/postContent/buddha')->with('success', 'Data updated successfully!');
    }

    public function destroy($id)
    {
        $buddha = Buddha::findOrFail($id);
        $buddha->delete();

        return redirect('/postContent/buddha')->with('success', 'Data deleted successfully!');
    }
}
