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
                <h1 class="text-xl font-bold">ផ្ទាំងគ្រប់គ្រង</h1>
                <p class="text-sm text-gray-500">សូមស្វាគមន៍, Admin!</p>
            </div>
        </div>

    </div>

    <!-- Cards Section -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <!-- Total Contents Card -->
        <div class="bg-white hover:bg-gray-50 rounded-2xl flex flex-col items-center justify-center p-6 shadow-lg transition-all duration-300 hover:transform hover:scale-105 border border-gray-100">
            <div class="bg-cyan-100 p-4 rounded-full mb-4">
                <i class="bi bi-collection text-cyan-600 text-4xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-gray-800">47</h1>
            <p class="text-gray-600 font-medium mt-2">សរុប​ មាតិកា</p>
            <a href="#" class="mt-4 bg-cyan-500 text-white px-6 py-2 rounded-full hover:bg-cyan-600 transition-colors duration-300 flex items-center gap-2">
                <span>View</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <!-- Total Books Card -->
        <div class="bg-white hover:bg-gray-50 rounded-2xl flex flex-col items-center justify-center p-6 shadow-lg transition-all duration-300 hover:transform hover:scale-105 border border-gray-100">
            <div class="bg-blue-100 p-4 rounded-full mb-4">
                <i class="bi bi-book text-blue-600 text-4xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-gray-800">18</h1>
            <p class="text-gray-600 font-medium mt-2">សរុប សៀវភៅ</p>
            <a href="/postContent/book" class="mt-4 bg-blue-500 text-white px-6 py-2 rounded-full hover:bg-blue-600 transition-colors duration-300 flex items-center gap-2">
                <span>View</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <!-- Total News Card -->
        <div class="bg-white hover:bg-gray-50 rounded-2xl flex flex-col items-center justify-center p-6 shadow-lg transition-all duration-300 hover:transform hover:scale-105 border border-gray-100">
            <div class="bg-green-100 p-4 rounded-full mb-4">
                <i class="bi bi-newspaper text-green-600 text-4xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-gray-800">16</h1>
            <p class="text-gray-600 font-medium mt-2">សរុប ព័ត៌មាន</p>
            <a href="/postContent/news" class="mt-4 bg-green-500 text-white px-6 py-2 rounded-full hover:bg-green-600 transition-colors duration-300 flex items-center gap-2">
                <span>View</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <!-- Total Users Card -->
        <div class="bg-white hover:bg-gray-50 rounded-2xl flex flex-col items-center justify-center p-6 shadow-lg transition-all duration-300 hover:transform hover:scale-105 border border-gray-100">
            <div class="bg-purple-100 p-4 rounded-full mb-4">
                <i class="bi bi-people text-purple-600 text-4xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-gray-800">01</h1>
            <p class="text-gray-600 font-medium mt-2">សរុប អ្នកប្រើប្រាស់</p>
            <a href="#" class="mt-4 bg-purple-500 text-white px-6 py-2 rounded-full hover:bg-purple-600 transition-colors duration-300 flex items-center gap-2">
                <span>View</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</div>
@endsection




</div>
