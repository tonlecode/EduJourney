@extends('layout')

@section('content')

  <!-- Topbar -->
  <div class="flex items-center justify-between bg-white p-4 rounded shadow mb-6">
    <div class="flex items-center gap-4">
        <a href="/postContent/buddha" class="text-gray-700">
            <i id="toggleIcon" class="bi bi-chevron-left text-2xl bg-cyan-700 rounded-xl px-3 text-white   transition-colors duration-200 hover:bg-cyan-800"></i>
        </a>
        <div>
            <h1 class="text-xl font-bold">គ្រប់គ្រង អប់រំផ្លូវចិត្ត</h1>
            <p class="text-sm text-gray-500">សូមស្វាគមន៍, Admin!</p>
        </div>
    </div>

</div>
<form action="/postContent/addBuddha" method="POST" class="space-y-4">
    @csrf

    <div class="mb-4">
      <label for="youtubeLink" class="block text-sm font-medium text-gray-700">YouTube Link</label>
      <input
      value="https://www.youtube.com/embed/"
        type="url"
        id="youtubeLink"
        name="youtubeLink"
        placeholder="https://www.youtube.com/watch?v=..."
        required
        class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-cyan-500 focus:border-cyan-500 p-2"
      />
    </div>

    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">ផុសដោយ</label>
        <input
          type="text"
          id="name"
          name="name"
          placeholder="ឈ្មោះអ្នកផុស"
          required
          class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-cyan-500 focus:border-cyan-500 p-2"
        />
      </div>

      <div class="mb-4">
        <label for="date" class="block text-sm font-medium text-gray-700">ខែ/ថ្ងៃ/ឆ្មាំ</label>
        <input
          type="date"
          id="date"
          name="date"
          placeholder="ថ្ងៃ/ខែ/ឆ្មាំ"
          required
          class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-cyan-500 focus:border-cyan-500 p-2"
        />
      </div>
      <button
      type="submit"
      class="w-full bg-cyan-600 hover:bg-cyan-700 text-white font-semibold py-3 px-6 rounded-xl transition duration-200"
    >
      បញ្ចូនទិន្នន័យ
    </button>
  </form>
@endsection

