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



/* CTE's */
Route::get('/ctes', 'App\Http\Controllers\CtesController@index');

/* CONTATOS */
Route::get('/contatos', 'App\Http\Controllers\ContatosController@index');
Route::get('/novocontato', 'App\Http\Controllers\ContatosController@novoContato');

Auth::routes();

/* PRINCIPAL */
Route::get('/', 'App\Http\Controllers\auth\LoginController@login');
Route::get('/registrar', 'App\Http\Controllers\auth\LoginController@registrar');
Route::get('/home', 'App\Http\Controllers\HomeController@index');

//Route::get('/forgotpassword', 'App\Http\Controllers\ForgotPasswordController@forgotpassword');

Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
    Route::get('/logout', 'App\Http\Controllers\LogoutController@perform')->name('logout.perform');
 }); 
