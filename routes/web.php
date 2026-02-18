<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CallbackRequestController as AdminCallbackRequestController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CallbackRequestController;

Route::get('/', function () {
    return view('welcome');
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
});

Route::post('/callback/store', [CallbackRequestController::class, 'store'])->name('callback.store');

Route::get('/robots.txt', function () {
    return response()
        ->view('robots')
        ->header('Content-Type', 'text/plain');
});

Route::get('/sitemap.xml', function () {
    if (!config('app.seo_index')) {
        abort(404);
    }

    return response()
        ->view('sitemap')
        ->header('Content-Type', 'application/xml');
});

