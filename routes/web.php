<?php

use App\Http\Controllers\OtdpController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecomendationController;
use App\Http\Controllers\HasilController;


Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes([
    'register' => false,
    // Registration Routes...
    'reset' => false,
    // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('/user', UserController::class);
    Route::resource('/otdp', OtdpController::class);
    Route::get('recomendation', [RecomendationController::class, 'index'])->name('recomendation.index');
    Route::get('recomendationCetak/{id}', [RecomendationController::class, 'cetakSurat'])->name('recomendation.cetakSurat');
    Route::get('hasil', [HasilController::class, 'index'])->name('hasil.index');
});
