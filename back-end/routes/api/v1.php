<?php
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuddhaController;
use App\Http\Controllers\CartoonController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\YoutubeAPIController;
use App\Http\Controllers\MessageController;


//YT API
Route::get('/youtube', [YoutubeAPIController::class, 'index']);
//content
Route::get('/buddhas', [BuddhaController::class, 'index']);
Route::get('/cartoons', [CartoonController::class, 'index']);
Route::get('books', [BookController::class, 'index']);
Route::get('/news', [NewsController::class, 'index']);


//chat



Route::middleware('auth:sanctum')->group(function () {
    Route::get('/messages', [MessageController::class, 'index']);
    Route::post('/messages', [MessageController::class, 'store']);
});

