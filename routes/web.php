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

Route::get('/', 'App\Http\Controllers\LoginController@Get')->name('login.index')->middleware('notislogged');
Route::post('/login', 'App\Http\Controllers\LoginController@Post')->name('login.post')->middleware('notislogged');

Route::get('/cadastro/user/', 'App\Http\Controllers\UserController@Get')->name('user.index')->middleware('notislogged');
Route::post('/cadastro/user/', 'App\Http\Controllers\UserController@Post')->name('user.post')->middleware('notislogged');
Route::get('/user/logout', 'App\Http\Controllers\UserController@Logout')->name('user.logout')->middleware('islogged');

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@Index')->name('dashboard')->middleware('islogged');
Route::get('/dashboard/transacao', 'App\Http\Controllers\DashboardController@TransactionsHistory')->name('dashboard.transaction')->middleware('islogged');

Route::post('transacao/adicionar_dinheiro', 'App\Http\Controllers\TransactionController@AddMoney')->name('transaction.addMoney')->middleware('islogged');
Route::post('transacao/transferir_dinheiro', 'App\Http\Controllers\TransactionController@TransferMoney')->name('transaction.transferMoney')->middleware('islogged');
