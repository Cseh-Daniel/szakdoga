<?php

use App\Http\Controllers\CommentController;
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

Route::redirect('/', '/home');
Route::redirect('/posts', '/home');

Route::get('/home', [PostController::class, 'index'])->name("home");

    Route::resource('posts', PostController::class);

    // Route::resource('posts', PostController::class)->only(['show','index']);
    // Route::resource('posts', PostController::class)->except(['store', 'create','update','destroy','edit']);



Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name("login");
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {

    // Route::resource('/posts',PostController::class);

    // Route::resources(['posts'=>PostController::class],['except'=>'show']);
    // Route::resource('/posts',PostController::class)->except(['show','index']);
    // Route::resource('/posts',PostController::class)->only(['create']);
    // Route::resource('posts', PostController::class);
    // Route::resource('posts', PostController::class)->except(['index', 'show']);
    // Route::resource('posts', PostController::class)->only(['store', 'create','update','destroy','edit']);
    // Route::resource('posts', PostController::class)->only(['create']);


    // Route::resource('posts', PostController::class, ['except' => ['index', 'show']]);
    // ->only([        'create', 'store', 'update', 'destroy'/    ]);


    Route::post('/logout', [LoginController::class, 'logout']);
    Route::resource('/comments', CommentController::class);
});
