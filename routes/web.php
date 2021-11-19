<?php

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/karya/add', [KaryaController::class, 'add'])->name('view_add_karya');
Route::post('/karya/add', [KaryaController::class, 'store'])->name('add_karya');
Route::get('/karya/{id}', [KaryaController::class, 'index'])->name('detail_karya');

// socialite routes
Route::get('sign-in-google', [UserController::class, 'google'])->name('login.google');
Route::get('auth/google/callback', [UserController::class, 'handleProviderCallback'])->name('google.callback');

require __DIR__.'/auth.php';
