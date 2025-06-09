@extends('layout')

@section('content')
<!-- Main Content -->
<div class="flex-1 p-6">
    <!-- Topbar -->
    <div class="flex items-center justify-between bg-white p-4 rounded shadow mb-6">
        <div class="flex items-center gap-4">
            <a href="/" class="text-gray-700">
                <i id="toggleIcon" class="bi bi-chevron-left text-2xl bg-cyan-700 rounded-xl px-3 text-white transition-colors duration-200 hover:bg-cyan-800"></i>
            </a>
            <div>
                <h1 class="text-xl font-bold">គ្រប់គ្រង សៀវភៅ</h1>
                <p class="text-sm text-gray-500">សូមស្វាគមន៍, Admin!</p>
            </div>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Books Table Section -->
    <div class="bg-white rounded-lg shadow-lg border border-gray-100 overflow-hidden">
        <div class="flex justify-between items-center p-6 border-b border-gray-100">
            <div class="flex items-center gap-3">
                <i class="bi bi-people-fill text-cyan-600 text-2xl"></i>
                <h2 class="text-xl font-semibold text-gray-800">បញ្ជី សៀវភៅ</h2>
            </div>
            <a href="/postContent/addBook" class="bg-cyan-500 hover:bg-cyan-600 text-white py-2 px-4 rounded-full transition-colors duration-300 flex items-center gap-2">
                <i class="bi bi-person-plus"></i>
                <span>បន្ថែមសៀវភៅ</span>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">លេខ</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ថ្ងៃបង្កើត</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ចំណងជើង</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">អ្នកនិពន្ធ</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">តំណភ្ជាប់ Book</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">រូបភាព</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">អ្នកផុស</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">សកម្មភាព</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach($contents as $index => $content)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-4 py-4 text-sm text-gray-600">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $content->created_at }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $content->title }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $content->author }}</td>
                            <td class="px-6 py-4 text-sm">
                                <a href="{{ asset($content->path) }}" target="_blank" class="text-blue-600 hover:underline">ពិនិត្យ Book</a>
                            </td>
                            <td class="px-6 py-4">
                                @if($content->cover_image)
                                    <img src="{{ asset('storage/' . $content->cover_image) }}" alt="Cover Image" class="w-16 h-20 object-cover rounded shadow">
                                @else
                                    <span class="text-gray-400 text-sm">មិនមាន</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs font-medium text-cyan-700 bg-cyan-100 rounded-full">
                                    {{ $content->name }}
                                </span>
                            </td>
                            <td class="px-6 py-4 space-x-3">
                                <a href="{{ route('book.edit', $content->id) }}" class="text-cyan-600 hover:text-cyan-900 flex items-center gap-1">
                                    <i class="bi bi-pencil-square"></i><span>កែប្រែ</span>
                                </a>
                                <form action="{{ route('book.destroy', $content->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 flex items-center gap-1" onclick="return confirm('តើអ្នកប្រាកដជាចង់លុបមែនទេ?')">
                                        <i class="bi bi-trash"></i><span>លុប</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
