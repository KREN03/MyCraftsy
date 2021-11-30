<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KaryaController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
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

Route::post('/getCategory', [HomeController::class, 'getCategories'])->name('api_getcategory');
Route::get('/karya/add', [KaryaController::class, 'add'])->name('view_add_karya');
Route::post('/karya/add', [KaryaController::class, 'store'])->name('add_karya');
Route::get('/karya/{id}', [KaryaController::class, 'index'])->name('detail_karya');
Route::post('/comment/add/{work_id}', [CommentController::class, 'store'])->name('comment_add');
Route::post('/like/{work_id}', [LikeController::class, 'like'])->name('like_add');

//profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/profile/update', [ProfileController::class, 'update'])->name('update_profile');
Route::post('/profile/update', [ProfileController::class, 'change'])->name('update_profile_db');
Route::get('/profile/stats', [ProfileController::class, 'stats'])->name('stats_profile');
Route::get('/getdatachart', [ProfileController::class, 'getMonthlyKeuanganData']);
// Competition
Route::get('/competition', [CompetitionController::class, 'index'])->name('competition');
Route::get('/competition/{slug}', [CompetitionController::class, 'detail'])->name('competition.detail');

// Forum
Route::get('/forum', [ForumController::class, 'index'])->name('forum');

Route::middleware(['auth'])->group(function () {
    Route::post('/forum', [ForumController::class, 'store'])->name('forum.store');
    Route::get('/forum/{forum}', [ForumController::class, 'detail'])->name('forum.detail');
    Route::post('/forum/{forum}', [ForumController::class, 'join'])->name('forum.join');
});

// socialite routes
Route::get('sign-in-google', [UserController::class, 'google'])->name('login.google');
Route::get('auth/google/callback', [UserController::class, 'handleProviderCallback'])->name('google.callback');

// Route::get('sign-in-facebook', [UserController::class, 'facebook'])->name('login.facebook');
// Route::get('auth/facebook/callback', [UserController::class, 'handleProviderCallbackFB'])->name('facebook.callback');

require __DIR__.'/auth.php';
