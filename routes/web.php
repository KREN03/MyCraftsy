<?php

use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KaryaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Karya
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/karya/add', [KaryaController::class, 'add'])->name('view_add_karya');
Route::post('/karya/add', [KaryaController::class, 'store'])->name('add_karya');
Route::get('/karya/{id}', [KaryaController::class, 'index'])->name('detail_karya');

// Competition
Route::get('/competition', [CompetitionController::class, 'index'])->name('competition');
Route::get('/competition/{slug}', [CompetitionController::class, 'detail'])->name('competition.detail');

// socialite routes
Route::get('sign-in-google', [UserController::class, 'google'])->name('login.google');
Route::get('auth/google/callback', [UserController::class, 'handleProviderCallback'])->name('google.callback');

// Route::get('sign-in-facebook', [UserController::class, 'facebook'])->name('login.facebook');
// Route::get('auth/facebook/callback', [UserController::class, 'handleProviderCallbackFB'])->name('facebook.callback');

require __DIR__.'/auth.php';
