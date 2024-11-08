<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        return view('pages.dashboard');
    })->name('home');

    Route::get('user/profil/{id}', [ProfilController::class, 'profil'])->name('user.profil');
    Route::put('user/updateProfile/{id}', [ProfilController::class, 'updateProfile'])->name('user.updateProfile');

    Route::resource('user', UserController::class);
    Route::resource('product', \App\Http\Controllers\ProductController::class);
    // Route::resource('order', \App\Http\Controllers\OrderController::class);
});
