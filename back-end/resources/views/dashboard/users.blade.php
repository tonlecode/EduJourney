@extends('layout')

@section('content')
<!-- Main Content -->
<div class="flex-1 p-6">
    <!-- Topbar -->
    <div class="flex items-center justify-between bg-white p-4 rounded shadow mb-6">
        <div class="flex items-center gap-4">
            <button onclick="toggleSidebar()" class="text-gray-700">
                <i id="toggleIcon" class="bi bi-list text-2xl"></i>
            </button>
            <div>
                <h1 class="text-xl font-bold">គ្រប់គ្រង អ្នកប្រើប្រាស់</h1>
                <p class="text-sm text-gray-500">សូមស្វាគមន៍, Admin!</p>
            </div>
        </div>

    </div>

    <!-- Users Table Section -->
    <div class="bg-white rounded-lg shadow-lg border border-gray-100 overflow-hidden">
        <div class="flex justify-between items-center p-6 border-b border-gray-100">
            <div class="flex items-center gap-3">
                <i class="bi bi-people-fill text-cyan-600 text-2xl"></i>
                <h2 class="text-xl font-semibold text-gray-800">បញ្ជី អ្នកប្រើប្រាស់</h2>
            </div>
            <button class="bg-cyan-500 hover:bg-cyan-600 text-white py-2 px-4 rounded-full transition-colors duration-300 flex items-center gap-2">
                <i class="bi bi-person-plus"></i>
                <span>បន្ថែមអ្នកប្រើប្រាស់</span>
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">លេខ</th>
                        <th class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ឈ្មោះ</th>
                        <th class="px-[5rem] py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">អ៊ីម៉ែល</th>
                        <th class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">តួនាទី</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">សកម្មភាព</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    <!-- Sample User Row -->
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">1</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 font-medium">Ry Chet</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">chetryinnocent@gmail.com</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 text-xs font-medium text-cyan-700 bg-cyan-100 rounded-full">Admin</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap space-x-3">
                            <button class="text-cyan-600 hover:text-cyan-900 transition-colors duration-200 flex items-center gap-1">
                                <i class="bi bi-pencil-square"></i>
                                <span>កែប្រែ</span>
                            </button>
                            <button class="text-red-600 hover:text-red-900 transition-colors duration-200 flex items-center gap-1">
                                <i class="bi bi-trash"></i>
                                <span>លុប</span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>
@endsection
