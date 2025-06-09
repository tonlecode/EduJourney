@extends('layout')

@section('content')

<!-- Topbar -->
<div class="flex items-center justify-between bg-white p-4 rounded shadow mb-6">
    <div class="flex items-center gap-4">
        <a href="/postContent/news" class="text-gray-700">
            <i id="toggleIcon" class="bi bi-chevron-left text-2xl bg-cyan-700 rounded-xl px-3 text-white transition-colors duration-200 hover:bg-cyan-800"></i>
        </a>
        <div>
            <h1 class="text-xl font-bold">គ្រប់គ្រង ព័ត៌មាន</h1>
            <p class="text-sm text-gray-500">សូមស្វាគមន៍, Admin!</p>
        </div>
    </div>
</div>

<form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-4">
        <label for="title" class="block text-sm font-medium text-gray-700">ចំណងជើង</label>
        <input type="text" name="title" required
            class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-cyan-500 focus:border-cyan-500 p-2">
    </div>

    <div class="mb-4">
        <label for="author" class="block text-sm font-medium text-gray-700">អ្នកនិពន្ធ</label>
        <input type="text" name="author" required
            class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-cyan-500 focus:border-cyan-500 p-2">
    </div>

    <div class="mb-4">
        <label for="description" class="block text-sm font-medium text-gray-700">ការពិពណ៌នា</label>
        <textarea name="description" rows="4"
            class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-cyan-500 focus:border-cyan-500 p-2"
            placeholder="សរសេរការពិពណ៌នាអំពីសៀវភៅ..."></textarea>
    </div>

    <div class="mb-4">
        <label for="source" class="block text-sm font-medium text-gray-700">ប្រភពមកពី</label>
        <input type="text" name="source"
            class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-cyan-500 focus:border-cyan-500 p-2">
    </div>

    <div class="mb-4">
        <label for="text" class="block text-sm font-medium text-gray-700">កាលបរិច្ឆេទ</label>
        <input type="text" name="date" required
            class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-cyan-500 focus:border-cyan-500 p-2">
    </div>

    <div class="mb-4">
        <label for="cover_image" class="block text-sm font-medium text-gray-700">រូបភាព (JPEG, PNG...)</label>
        <input
            type="file"
            name="cover_image"
            accept="image/*"
            required
            class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-cyan-500 focus:border-cyan-500 p-2"
        >
    </div>

    <button type="submit"
        class="w-full bg-cyan-600 hover:bg-cyan-700 text-white font-semibold py-3 px-6 rounded-xl transition duration-200">
        បញ្ចូនទិន្នន័យ
    </button>
</form>
@endsection
