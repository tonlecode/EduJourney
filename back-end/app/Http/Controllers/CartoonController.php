<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cartoon;
use Illuminate\Support\Str;

class cartoonController extends Controller
{
    public function index()
    {
        return Cartoon::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            // 'id' => 'required|string',
            'youtubeLink' => 'required|url',
            'name' => 'required|string',
            'date' => 'required|date',
        ]);

        Cartoon::create([
            'id_code' => Str::uuid(),
            'youtube_link' => $validated['youtubeLink'],
            'name' => $validated['name'],
            'date' => $validated['date'],
        ]);

        return redirect('/postContent/cartoon')->with('success', 'Data saved successfully!');
    }

    public function edit($id)
    {
        $cartoon = Cartoon::findOrFail($id);
        return view('postContent.Cartoons.editCartoon', compact('cartoon'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'youtubeLink' => 'required|url',
            'name' => 'required|string',
            'date' => 'required|date',
        ]);

        $cartoon = Cartoon::findOrFail($id);
        $cartoon->update([
            'youtube_link' => $validated['youtubeLink'],
            'name' => $validated['name'],
            'date' => $validated['date'],
        ]);

        return redirect('/postContent/cartoon')->with('success', 'Data updated successfully!');
    }

    public function destroy($id)
    {
        $cartoon = Cartoon::findOrFail($id);
        $cartoon->delete();

        return redirect('/postContent/cartoon')->with('success', 'Data deleted successfully!');
    }
}
