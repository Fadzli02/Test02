<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\UserController;
use App\Models\Album;
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

Route::middleware('guest')->group(function () {
    Route::view('/signin', 'auth.signin')->name('login');
    Route::post('/signup', [AuthController::class, 'signup']);

    Route::view('/signup', 'auth.signup');
    Route::post('/signin', [AuthController::class, 'signin']);
});

Route::middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index']);

    Route::get('/signout', [AuthController::class, 'signout']);
    Route::post('/signout', [AuthController::class, 'signout']);

    Route::controller(GalleryController::class)->group(function () {
        Route::get('/profile', 'index');
        Route::get('/newImage', 'create');
        Route::post('/upload', 'store');
        Route::get('/edit/{id_foto}/{username}', 'edit');
        Route::put('/edit/{id_foto}', 'update');
        Route::delete('/delete/{id_foto}', 'destroy');
        Route::get('/detail/{id_foto}', 'show');
    });

    Route::controller(AlbumController::class)->group(function() {
        Route::get('/albums', 'index');
        Route::get('/albums/new', 'create');
    });
});

Route::get('/auth/redirect', [AuthController::class, 'googleSignin']);
Route::get('/google/redirect', [AuthController::class, 'googleRedirect']);
