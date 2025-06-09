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
                <h1 class="text-xl font-bold">ប្រភេទមាតិកា</h1>
                <p class="text-sm text-gray-500">សូមស្វាគមន៍, Admin!</p>
            </div>
        </div>

    </div>

    <!-- Cards Section -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <!-- Mental Education Card -->
        <div class="bg-white hover:bg-gray-50 rounded-2xl flex flex-col items-center justify-center p-6 shadow-lg transition-all duration-300 hover:transform hover:scale-105 border border-gray-100">
            <div class="bg-pink-100 p-4 rounded-full mb-4">
                <i class="bi bi-heart-pulse text-pink-600 text-4xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-gray-800">12</h1>
            <p class="text-gray-600 font-medium mt-2">អប់រំផ្លូវចិត្ត</p>
            <a href="/postContent/buddha" class="mt-4 bg-pink-500 text-white px-6 py-2 rounded-full hover:bg-pink-600 transition-colors duration-300 flex items-center gap-2">
                <span>View</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <!-- General Knowledge Card -->
        <div class="bg-white hover:bg-gray-50 rounded-2xl flex flex-col items-center justify-center p-6 shadow-lg transition-all duration-300 hover:transform hover:scale-105 border border-gray-100">
            <div class="bg-cyan-100 p-4 rounded-full mb-4">
                <i class="bi bi-book text-cyan-600 text-4xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-gray-800">00</h1>
            <p class="text-gray-600 font-medium mt-2">ចំណេះដឹងទូរទៅ</p>
            <a href="#" class="mt-4 bg-cyan-500 text-white px-6 py-2 rounded-full hover:bg-cyan-600 transition-colors duration-300 flex items-center gap-2">
                <span>View</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <!-- English Card -->
        <div class="bg-white hover:bg-gray-50 rounded-2xl flex flex-col items-center justify-center p-6 shadow-lg transition-all duration-300 hover:transform hover:scale-105 border border-gray-100">
            <div class="bg-blue-100 p-4 rounded-full mb-4">
                <i class="bi bi-translate text-blue-600 text-4xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-gray-800">00</h1>
            <p class="text-gray-600 font-medium mt-2">អង់គ្លេស</p>
            <a href="#" class="mt-4 bg-blue-500 text-white px-6 py-2 rounded-full hover:bg-blue-600 transition-colors duration-300 flex items-center gap-2">
                <span>View</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <!-- Physics Card -->
        <div class="bg-white hover:bg-gray-50 rounded-2xl flex flex-col items-center justify-center p-6 shadow-lg transition-all duration-300 hover:transform hover:scale-105 border border-gray-100">
            <div class="bg-purple-100 p-4 rounded-full mb-4">
                <i class="bi bi-headphones text-purple-600 text-4xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-gray-800">00</h1>
            <p class="text-gray-600 font-medium mt-2">ភតខាស</p>
            <a href="#" class="mt-4 bg-purple-500 text-white px-6 py-2 rounded-full hover:bg-purple-600 transition-colors duration-300 flex items-center gap-2">
                <span>View</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <!-- Technology Card -->
        <div class="bg-white hover:bg-gray-50 rounded-2xl flex flex-col items-center justify-center p-6 shadow-lg transition-all duration-300 hover:transform hover:scale-105 border border-gray-100">
            <div class="bg-green-100 p-4 rounded-full mb-4">
                <i class="bi bi-cpu text-green-600 text-4xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-gray-800">00</h1>
            <p class="text-gray-600 font-medium mt-2">បច្ចេកវិទ្យា</p>
            <a href="#" class="mt-4 bg-green-500 text-white px-6 py-2 rounded-full hover:bg-green-600 transition-colors duration-300 flex items-center gap-2">
                <span>View</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <!-- Toys Card -->
        <div class="bg-white hover:bg-gray-50 rounded-2xl flex flex-col items-center justify-center p-6 shadow-lg transition-all duration-300 hover:transform hover:scale-105 border border-gray-100">
            <div class="bg-yellow-100 p-4 rounded-full mb-4">
                <i class="bi bi-robot text-yellow-600 text-4xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-gray-800">13</h1>
            <p class="text-gray-600 font-medium mt-2">តុក្កតា</p>
            <a href="/postContent/cartoon" class="mt-4 bg-yellow-500 text-white px-6 py-2 rounded-full hover:bg-yellow-600 transition-colors duration-300 flex items-center gap-2">
                <span>View</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <!-- Add more cards if needed -->
    </div>
</div>
@endsection
