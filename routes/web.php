<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CallbackRequestController as AdminCallbackRequestController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\NewsUploadController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CallbackRequestController;
use App\Http\Controllers\NewsController;
use App\Models\News;

Route::get('/', function () {
    $latestNews = News::published()
        ->orderByDesc('published_at')
        ->orderByDesc('id')
        ->limit(6)
        ->get();

    return view('welcome', compact('latestNews'));
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.callback-requests.index');
    })->name('index');

    Route::get('/callback-requests', [AdminCallbackRequestController::class, 'index'])
        ->name('callback-requests.index');
    Route::patch('/callback-requests/{callbackRequest}/read', [AdminCallbackRequestController::class, 'markAsRead'])
        ->name('callback-requests.mark-read');
    Route::patch('/callback-requests/{callbackRequest}/unread', [AdminCallbackRequestController::class, 'markAsUnread'])
        ->name('callback-requests.mark-unread');

    Route::get('/news', [AdminNewsController::class, 'index'])->name('news.index');
    Route::get('/news/create', [AdminNewsController::class, 'create'])->name('news.create');
    Route::post('/news', [AdminNewsController::class, 'store'])->name('news.store');
    Route::get('/news/{news}/edit', [AdminNewsController::class, 'edit'])->name('news.edit');
    Route::patch('/news/{news}', [AdminNewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{news}', [AdminNewsController::class, 'destroy'])->name('news.destroy');
    Route::post('/news/upload', [NewsUploadController::class, 'store'])->name('news.upload');
});

Route::post('/callback/store', [CallbackRequestController::class, 'store'])->name('callback.store');

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');
