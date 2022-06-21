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


Auth::routes();
Route::get('/email', function() {
    return new WelcomeMail();
});
Route::post('follow/{user}', [App\Http\Controllers\FollowsController::class, 'store' ]);
/////////////////////////  ProfilesController
Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profiles.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profiles.show');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profiles.update');

Auth::routes();
///////////////////////// PostsController
Route::get('/', [App\Http\Controllers\PostsController::class, 'index']);
Route::get('/p/create', [App\Http\Controllers\PostsController::class, 'create']);
Route::post('/p', [App\Http\Controllers\PostsController::class, 'store']);
Route::get('/p/{post}', [App\Http\Controllers\PostsController::class, 'show']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
