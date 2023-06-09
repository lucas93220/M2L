<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\M2LController;
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
});

Route::get('connected', [M2LController::class, 'connexion']);

Route::get('list', [M2LController::class, 'list']);

Route::get('/config', function () {return view('config');});

Route::post('login-user', [M2LController::class, 'loginUser'])->name('login-user');

Route::post('config-user', [M2LController::class, 'config'])->name('config-user');