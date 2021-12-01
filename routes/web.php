<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/', 'App\Http\Controllers\CtesController@index');
Route::get('/home', 'App\Http\Controllers\CtesController@index');

/* CTE's */
Route::get('/ctes', 'App\Http\Controllers\CtesController@index');
Route::get('/ctes/novocte', 'App\Http\Controllers\CtesController@novoCte');
Route::post('/cte-enviar', 'App\Http\Controllers\CtesController@manter');
Route::get('/ctes/editar/{id}', 'App\Http\Controllers\CtesController@edit');
Route::get('/ctes/atualizar/{id}', 'App\Http\Controllers\CtesController@update');
Route::get('/ctes/{id}', 'App\Http\Controllers\CtesController@show');

/* Clientes */
Route::get('/novocliente', 'App\Http\Controllers\ClientesController@novoCliente');
Route::get('/novoclientepop', 'App\Http\Controllers\ClientesController@novoClientePop');
Route::post('/cliente-enviar', 'App\Http\Controllers\ClientesController@manter');

/* CONTATOS */
Route::get('/contatos', 'App\Http\Controllers\ContatosController@index');
Route::get('/contatos/novocontato', 'App\Http\Controllers\ContatosController@novoContato');
Route::post('/contato-enviar', 'App\Http\Controllers\ContatosController@manter');
Route::get('/contatos/editar/{id}', 'App\Http\Controllers\ContatosController@edit');
Route::get('/contatos/atualizar/{id}', 'App\Http\Controllers\ContatosController@update');
Route::get('/contatos/{id}', 'App\Http\Controllers\ContatosController@show');

/* DESPESAS */
Route::get('/despesas', 'App\Http\Controllers\DespesasController@index');
Route::get('/despesas/novadespesa', 'App\Http\Controllers\DespesasController@novaDespesa');
Route::post('/despesa-enviar', 'App\Http\Controllers\DespesasController@manter');
Route::get('/despesas/editar/{id}', 'App\Http\Controllers\DespesasController@edit');
Route::get('/despesas/atualizar/{id}', 'App\Http\Controllers\DespesasController@update');
Route::get('/despesas/{id}', 'App\Http\Controllers\DespesasController@show');



