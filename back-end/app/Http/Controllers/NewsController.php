<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\news;
use Illuminate\Support\Str;

class newsController extends Controller
{
    // Display all newss
   // In newsController.php
public function index()
{
    $newss = News::all();

    return $newss->map(function ($news) {
        if ($news->cover_image) {
            $news->cover_image = url('storage/imgNews/' . $news->cover_image);
        }
        return $news;
    });
}


    // Store a new news with cover image
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file_path' => 'nullable|string',
            'page_count' => 'nullable|integer',
            'language' => 'nullable|string',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Move image directly to public/storage/imgNews
            $image->move(public_path('storage/imgNews'), $imageName);

            $validated['cover_image'] = $imageName;
        }

        $validated['id_code'] = Str::uuid();
        $news = News::create($validated);

        return redirect('/postContent/news')->with('success', 'news added successfully!');
    }

    // Show the edit form
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('postContent.news.editnews', compact('news'));
    }

    // Update news with new cover image
    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file_path' => 'nullable|string',
            'page_count' => 'nullable|integer',
            'language' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('cover_image')) {
            // Delete old image from public/storage/imgNews
            if ($news->cover_image && file_exists(public_path('storage/imgNews/' . $news->cover_image))) {
                unlink(public_path('storage/imgNews/' . $news->cover_image));
            }

            $image = $request->file('cover_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('storage/imgNews'), $imageName);
            $validated['cover_image'] = $imageName;
        }

        $news->update($validated);

        return redirect('/postContent/news')->with('success', 'news updated successfully!');
    }

    // Delete a news and its image
    public function destroy($id)
    {
        $news = News::findOrFail($id);

        // Delete cover image from public/storage/imgNews
        if ($news->cover_image && file_exists(public_path('storage/imgNews/' . $news->cover_image))) {
            unlink(public_path('storage/imgNews/' . $news->cover_image));
        }

        $news->delete();

        return redirect('/postContent/news')->with('success', 'news deleted successfully!');
    }
}
