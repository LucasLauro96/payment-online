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

Route::get('/', 'App\Http\Controllers\GeneralController@Main')->middleware('islogged');

Route::get('/login/{tipo}', 'App\Http\Controllers\LoginController@Get')->name('login.index')->middleware('islogged');
Route::post('/login', 'App\Http\Controllers\LoginController@Post')->name('login.post')->middleware('islogged');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/cadastro/{tipo}', 'App\Http\Controllers\UserController@Get')->name('user.index')->middleware('islogged');
Route::post('/cadastro/user/', 'App\Http\Controllers\UserController@Post')->name('user.post')->middleware('islogged');