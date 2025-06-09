<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Storage;

class MessageController extends Controller
{

public function index()
{
    return Message::with('sender')->latest()->get();
}

public function store(Request $request)
{
    $data = $request->validate([
        'content' => 'nullable|string',
        'file' => 'nullable|file|mimes:jpeg,png,jpg,mp4,mov,avi|max:20480',
    ]);

    $fileType = 'none';
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $path = $file->store('uploads', 'public');

        if (str_starts_with($file->getMimeType(), 'image')) {
            $fileType = 'image';
        } elseif (str_starts_with($file->getMimeType(), 'video')) {
            $fileType = 'video';
        }

        $data['file'] = $path;
        $data['file_type'] = $fileType;
    }

    $data['sender_id'] = auth()->id();
    $message = Message::create($data);

    // Load sender relation to return it with message
    $message->load('sender');

    return response()->json($message);
}

}
