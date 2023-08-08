<?php

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

Route::get('/', [\App\Http\Controllers\PostController::class, 'index'])->name('home');
Route::get('post/{slug}', [\App\Http\Controllers\PostController::class, 'show'])->name('post');
Route::post('comment', [\App\Http\Controllers\CommentController::class, 'store'])->name('comment');

Route::group([
        'prefix' => 'admin',
        'middleware' => 'admin'
    ], function (){
    Route::get('/', [\App\Http\Controllers\Admin\MainController::class, 'index'])->name('admin.index');
    Route::resources([
        'posts' => \App\Http\Controllers\Admin\PostController::class,
    ]);
    Route::delete('comment-delete/{id}', [\App\Http\Controllers\Admin\CommentController::class, 'destroy'])->name('admin.comment-delete');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('register', [\App\Http\Controllers\UserController::class, 'create'])->name('register.create');
    Route::post('register', [\App\Http\Controllers\UserController::class, 'store'])->name('register.store');

    Route::get('login', [\App\Http\Controllers\UserController::class, 'loginForm'])->name('login.create');
    Route::post('login', [\App\Http\Controllers\UserController::class, 'login'])->name('login');
});

Route::get('logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout')->middleware('auth');
