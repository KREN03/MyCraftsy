<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KaryaController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/karya/add', [KaryaController::class, 'add'])->name('view_add_karya');
Route::post('/karya/add', [KaryaController::class, 'store'])->name('add_karya');
Route::get('/karya/{id}', [KaryaController::class, 'index'])->name('detail_karya');
