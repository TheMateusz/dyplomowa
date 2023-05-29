<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InterestsController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
})->middleware('guest');

Route::middleware(['auth', 'verified', 'user.interest.data'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/search', [HomeController::class, 'search'])->name('home.search');
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');
    Route::get('/interest', [InterestsController::class, 'index'])->name('interest.index');
    Route::put('/interest', [InterestsController::class, 'update'])->name('interest.update');
    Route::get('/detail', [DetailsController::class, 'index'])->name('detail.index');
    Route::put('/detail', [DetailsController::class, 'update'])->name('detail.update');
    Route::put('/post', [PostController::class, 'store'])->name('post.store');
    Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');
    Route::get('/post/{post}', [PostController::class, 'edit'])->name('post.edit');
    Route::post('/post/{post}/like', [PostController::class, 'likePost'])->name('post.like');
    Route::post('/post/{post}/unlike', [PostController::class, 'unlikePost'])->name('post.unlike');

    Route::get('/message/{id}', [ChatController::class, 'getMessage'])->name('message');
    Route::get('user/message/{id}', [ChatController::class, 'getMessage'])->name('message');
    Route::post('message', [ChatController::class,'sendMessage']);
    Route::post('user/message', [ChatController::class,'sendMessage']);

});

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

Auth::routes(['verify' => true]);

