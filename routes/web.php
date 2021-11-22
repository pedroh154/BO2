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

/* Route::get('/', function () {
    return view('welcome');
});
*/

/* login/registro */
Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
    Route::get('/logout', 'App\Http\Controllers\LogoutController@perform')->name('logout.perform');
 }); 

/* home (auth) */
Route::get('/home', 'App\Http\Controllers\HomeController@index');

/* CTE's */
Route::get('/ctes', 'App\Http\Controllers\CtesController@index');

/* CONTATOS */
Route::get('/contatos', 'App\Http\Controllers\ContatosController@index');
Route::get('/novocontato', 'App\Http\Controllers\ContatosController@novoContato');

/* DESPESAS */
Route::get('/despesas', 'App\Http\Controllers\DespesasController@index');



