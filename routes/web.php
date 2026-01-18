<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/callback/store', [CallbackRequestController::class, 'store'])->name('callback.store');
