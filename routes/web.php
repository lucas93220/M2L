<?php

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

Route::get('/', function () { return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'users'])->name('home');
/*------UPDATE USER PROFILE------*/
Route::get('/profile/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('profile');
Route::put('/profile/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('profile.update');
/*-------SEARCH-------*/
Route::get('/search',  [App\Http\Controllers\UserController::class, 'search'])->name('search');



