@extends('layout')

@section('content')
<!-- Topbar -->
<div class="flex items-center justify-between bg-white p-4 rounded shadow mb-6">
    <div class="flex items-center gap-4">
        <a href="/postContent/Cartoon" class="text-gray-700">
            <i id="toggleIcon" class="bi bi-chevron-left text-2xl bg-cyan-700 rounded-xl px-3 text-white transition-colors duration-200 hover:bg-cyan-800"></i>
        </a>
        <div>
            <h1 class="text-xl font-bold">គ្រប់គ្រង តុក្កតា</h1>
            <p class="text-sm text-gray-500">សូមស្វាគមន៍, Admin!</p>
        </div>
    </div>
</div>

<form action="{{ route('cartoon.update', $cartoon->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label for="youtubeLink" class="block text-sm font-medium text-gray-700">YouTube Link</label>
        <input type="url" name="youtubeLink" id="youtubeLink" value="{{ $cartoon->youtube_link }}" required
            class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-cyan-500 focus:border-cyan-500 p-2">
    </div>

    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">ផុសដោយ</label>
        <input type="text" name="name" id="name" value="{{ $cartoon->name }}" required
            class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-cyan-500 focus:border-cyan-500 p-2">
    </div>

    <div class="mb-4">
        <label for="date" class="block text-sm font-medium text-gray-700">កាលបរិច្ឆេទ</label>
        <input type="date" name="date" id="date" value="{{ $cartoon->date }}" required
                    class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-cyan-500 focus:border-cyan-500 p-2">
    </div>

    <div class="flex justify-end space-x-3 mt-6">
        <a href="/postContent/cartoon" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-full transition-colors duration-300">
            ត្រឡប់ក្រោយ
        </a>
        <button type="submit" class="bg-cyan-500 hover:bg-cyan-600 text-white py-2 px-4 rounded-full transition-colors duration-300">
            រក្សាទុក
        </button>
    </div>
</form>
@endsection













