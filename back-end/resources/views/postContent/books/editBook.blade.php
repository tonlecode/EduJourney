@extends('layout')

@section('content')

<!-- Topbar -->
<div class="flex items-center justify-between bg-white p-4 rounded shadow mb-6">
    <div class="flex items-center gap-4">
        <a href="/postContent/book" class="text-gray-700">
            <i id="toggleIcon" class="bi bi-chevron-left text-2xl bg-cyan-700 rounded-xl px-3 text-white transition-colors duration-200 hover:bg-cyan-800"></i>
        </a>
        <div>
            <h1 class="text-xl font-bold">គ្រប់គ្រង សៀវភៅ</h1>
            <p class="text-sm text-gray-500">សូមស្វាគមន៍, Admin!</p>
        </div>
    </div>
</div>

<!-- Edit Book Form -->


    <form action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">ចំណងជើង</label>
            <input type="text" name="title" id="title" value="{{ $book->title }}" 
                class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-cyan-500 focus:border-cyan-500 p-2">
        </div>

        <div>
            <label for="author" class="block text-sm font-medium text-gray-700">អ្នកនិពន្ធ</label>
            <input type="text" name="author" id="author" value="{{ $book->author }}"
                class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-cyan-500 focus:border-cyan-500 p-2">
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">ការពិពណ៌នា</label>
            <textarea name="description" id="description" rows="4"
                class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-cyan-500 focus:border-cyan-500 p-2"
                placeholder="សរសេរការពិពណ៌នាអំពីសៀវភៅ...">{{ $book->description }}</textarea>
        </div>

        <div>
            <label for="file_path" class="block text-sm font-medium text-gray-700">File Path</label>
            <input type="text" name="file_path" id="file_path" value="{{ $book->file_path }}" 
                class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-cyan-500 focus:border-cyan-500 p-2">
        </div>

        <div>
            <label for="page_count" class="block text-sm font-medium text-gray-700">Page Count</label>
            <input type="number" name="page_count" id="page_count" value="{{ $book->page_count }}"
                class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-cyan-500 focus:border-cyan-500 p-2">
        </div>

        <div>
            <label for="language" class="block text-sm font-medium text-gray-700">Language</label>
            <input type="text" name="language" id="language" value="{{ $book->language }}" 
                class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-cyan-500 focus:border-cyan-500 p-2">
        </div>

        <div>
            <label for="cover_image" class="block text-sm font-medium text-gray-700">រូបភាព (JPEG, PNG...)</label>
            <input type="file" name="cover_image" id="cover_image" accept="image/*"
                class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-cyan-500 focus:border-cyan-500 p-2">
            @if($book->cover_image)
                <img src="{{ Storage::disk('public')->url('images/' . $book->cover_image) }}" alt="Current cover image" class="mt-2 h-32">
            @endif
        </div>

        <div class="flex justify-end space-x-3">
            <a href="/postContent/book" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-full">
                ត្រឡប់ក្រោយ
            </a>
            <button type="submit" class="bg-cyan-600 hover:bg-cyan-700 text-white px-4 py-2 rounded-full">
                ធ្វើបច្ចុប្បន្នភាព
            </button>
        </div>
    </form>
</div>

@endsection
