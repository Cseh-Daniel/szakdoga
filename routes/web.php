<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Routing\RouteGroup;
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

//delete comments and post
//userpage password change ?profpic?

Route::redirect('/', '/home');
Route::redirect('/posts', '/home');

Route::get('/posts/filter',[FilterController::class,'index']);

Route::prefix('/posts/filter')->group(function () {
    // /posts/filter?profession_id=9&trainee=true&county_id=5
    Route::get('/profession/{id}', [FilterController::class, 'filterByProfession']);
});

Route::get('/home', [PostController::class, 'index'])->name("home");

Route::resource('posts', PostController::class);

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name("login");
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::resource('/comments', CommentController::class);
});
