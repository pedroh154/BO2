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

Route::get('/', 'App\Http\Controllers\PagesController@index');

Route::get('/contato', 'App\Http\Controllers\PagesController@contato');

Route::get('/criarcontato', 'App\Http\Controllers\PagesController@criarcontato');

Route::get('/login', 'App\Http\Controllers\PagesController@login');
