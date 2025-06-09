<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BuddhaController;
use App\Http\Controllers\CartoonController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\NewsController;


use App\Models\News;
use App\Models\User;
use App\Models\Buddha;
use App\Models\Cartoon;
use App\Models\Book;


// Authentication Routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Protected Routes (requires authentication)
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/', fn () => view('dashboard.index'))->name('dashboard.home');
    Route::get('/dashboard/typeOfContents', fn () => view('dashboard.typeOfContents'))->name('dashboard.typeOfContents');
    Route::get('/dashboard/users', fn () => view('dashboard.users'))->name('dashboard.users');

    // Buddha Routes
    Route::prefix('postContent')->name('buddha.')->controller(BuddhaController::class)->group(function () {
        Route::get('/buddha', function () {
            $contents = Buddha::all();
            return view('postContent.buddhas.buddha', compact('contents'));
        })->name('list');

        Route::get('/addBuddha', fn () => view('postContent.buddhas.addBuddha'))->name('create');
        Route::post('/addBuddha', 'store')->name('store');
        Route::get('/buddha/{id}', 'edit')->name('edit');
        Route::put('/buddha/{id}', 'update')->name('update');
        Route::delete('/buddha/{id}', 'destroy')->name('destroy');
    });

    Route::get('/dashboard/buddha', [BuddhaController::class, 'index'])->name('dashboard.buddha.index');

    // Cartoon Routes
    Route::prefix('postContent')->name('cartoon.')->controller(CartoonController::class)->group(function () {
        Route::get('/cartoon', function () {
            $contents = Cartoon::all();
            return view('postContent.cartoons.Cartoon', compact('contents'));
        })->name('list');

        Route::get('/addCartoon', fn () => view('postContent.cartoons.addCartoon'))->name('create');
        Route::post('/addCartoon', 'store')->name('store');
        Route::get('/cartoon/{id}', 'edit')->name('edit');
        Route::put('/cartoon/{id}', 'update')->name('update');
        Route::delete('/cartoon/{id}', 'destroy')->name('destroy');
    });

    Route::get('/dashboard/cartoon', [CartoonController::class, 'index'])->name('dashboard.cartoon.index');




// Book Routes
Route::prefix('postContent')->name('book.')->controller(BookController::class)->group(function () {
    Route::get('/book', function () {
        $contents = Book::all();
        return view('postContent.books.Book', compact('contents'));
    })->name('list');

    Route::get('/addBook', fn () => view('postContent.Books.addBook'))->name('create');
    Route::post('/addBook', 'store')->name('store');
    Route::get('/book/{id}', 'edit')->name('edit');
    Route::put('/book/{id}', 'update')->name('update');
    Route::delete('/book/{id}', 'destroy')->name('destroy');
});

Route::get('/dashboard/book', [BookController::class, 'index'])->name('dashboard.book.index');


    // News Routes
Route::prefix('postContent')->name('news.')->controller(NewsController::class)->group(function () {
    Route::get('/news', function () {
        $contents = News::all();
        return view('postContent.news.news', compact('contents'));
    })->name('list');

    Route::get('/addNews', fn () => view('postContent.news.addNews'))->name('create');
    Route::post('/addNews', 'store')->name('store');
    Route::get('/news/{id}', 'edit')->name('edit');
    Route::put('/news/{id}', 'update')->name('update');
    Route::delete('/news/{id}', 'destroy')->name('destroy');
});

// Optional dashboard view
Route::get('/dashboard/news', [NewsController::class, 'index'])->name('dashboard.news.index');
});


//ai
use Illuminate\Support\Facades\Http;

Route::get('/test-openai', function () {
    $response = Http::withToken(env('OPENAI_API_KEY'))
        ->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => 'Hello!']
            ]
        ]);

    return $response->json();
});
