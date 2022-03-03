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
Route::get('/home', 'App\Http\Controllers\CtesController@index')->middleware('auth');;
Route::redirect('/', '/home')->middleware('auth');;

/* CTE's */
Route::get('/ctes', 'App\Http\Controllers\CtesController@index')->middleware('auth');;
Route::get('/ctes/novocte', 'App\Http\Controllers\CtesController@novoCte')->middleware('auth');;
Route::post('/cte-enviar', 'App\Http\Controllers\CtesController@manter')->middleware('auth');;
Route::get('/ctes/editar/{id}', 'App\Http\Controllers\CtesController@edit')->middleware('auth');;
Route::get('/ctes/atualizar/{id}', 'App\Http\Controllers\CtesController@update')->middleware('auth');;
Route::get('/ctes/{id}', 'App\Http\Controllers\CtesController@show')->middleware('auth');;
Route::delete('/ctes/excluir/{id}', 'App\Http\Controllers\CtesController@destroy')->middleware('auth');;
Route::post('/cte-fetch', 'App\Http\Controllers\CtesController@RF_Fetch')->middleware('auth');;

Route::post('/getCidades', 'App\Http\Controllers\CtesController@getCidades')->middleware('auth');

/* Clientes */
Route::get('/clientes', 'App\Http\Controllers\ClientesController@index')->middleware('auth');;
Route::get('/clientes/novocliente', 'App\Http\Controllers\ClientesController@novoCliente')->middleware('auth');;
Route::get('/clientes/novoclientepop', 'App\Http\Controllers\ClientesController@novoClientePop')->middleware('auth');;
Route::post('/cliente-enviar', 'App\Http\Controllers\ClientesController@manter')->middleware('auth');;
Route::get('/clientes/editar/{id}', 'App\Http\Controllers\ClientesController@edit')->middleware('auth');;
Route::get('/clientes/atualizar/{id}', 'App\Http\Controllers\ClientesController@update')->middleware('auth');;
Route::get('/clientes/{id}', 'App\Http\Controllers\ClientesController@show')->middleware('auth');;
Route::delete('/clientes/excluir/{id}', 'App\Http\Controllers\ClientesController@destroy')->middleware('auth');;

/* CONTATOS */
Route::get('/contatos', 'App\Http\Controllers\ContatosController@index')->middleware('auth');;
Route::get('/contatos/novocontato', 'App\Http\Controllers\ContatosController@novoContato')->middleware('auth');;
Route::post('/contato-enviar', 'App\Http\Controllers\ContatosController@manter')->middleware('auth');;
Route::get('/contatos/editar/{id}', 'App\Http\Controllers\ContatosController@edit')->middleware('auth');;
Route::get('/contatos/atualizar/{id}', 'App\Http\Controllers\ContatosController@update')->middleware('auth');;
Route::get('/contatos/{id}', 'App\Http\Controllers\ContatosController@show')->middleware('auth');;
Route::delete('/contatos/excluir/{id}', 'App\Http\Controllers\ContatosController@destroy')->middleware('auth');;

/* DESPESAS */
Route::get('/despesas', 'App\Http\Controllers\DespesasController@index')->middleware('auth');;
Route::get('/despesas/novadespesa', 'App\Http\Controllers\DespesasController@novaDespesa')->middleware('auth');;
Route::post('/despesa-enviar', 'App\Http\Controllers\DespesasController@manter')->middleware('auth');;
Route::get('/despesas/editar/{id}', 'App\Http\Controllers\DespesasController@edit')->middleware('auth');;
Route::get('/despesas/atualizar/{id}', 'App\Http\Controllers\DespesasController@update')->middleware('auth');;
Route::get('/despesas/{id}', 'App\Http\Controllers\DespesasController@show')->middleware('auth');;
Route::delete('/despesas/excluir/{id}', 'App\Http\Controllers\DespesasController@destroy')->middleware('auth');;


/* CONFIG */
Route::get('/user/config', 'App\Http\Controllers\UserConfigController@index')->middleware('auth');;
Route::get('/user/config/alterarsenha', 'App\Http\Controllers\UserConfigController@alterarsenha')->middleware('auth');;
Route::get('/user/config/alterarssw', 'App\Http\Controllers\UserConfigController@alterarssw')->middleware('auth');;
