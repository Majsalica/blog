<?php

use App\Http\Controllers\PostController;
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

// Login & Registration routes
Route::get('/', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/', [UserController::class, 'login'])->name('login-user');
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register'])->name('register-user');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');


// Post routes
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/create-post', [PostController::class, 'create'])->name('create-post');
Route::post('/create-post', [PostController::class, 'store'])->name('store-post');
Route::get('/show-post/{post}', [PostController::class, 'show'])->name('show-post');
Route::get('/edit-posts/{post}', [PostController::class, 'edit'])->name('edit-post');
Route::patch('/edit-posts/{post}', [PostController::class, 'update'])->name('update-post');
Route::get('/destroy-post/{post}', [PostController::class, 'destroy'])->name('destroy-post');
