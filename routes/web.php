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
Route::get('/', 'App\Http\Controllers\CtesController@index');
Route::get('/home', 'App\Http\Controllers\CtesController@index');

/* CTE's */
Route::get('/ctes', 'App\Http\Controllers\CtesController@index');
Route::get('/ctes/novocte', 'App\Http\Controllers\CtesController@novoCte');
Route::get('/ctes/detalhescte', 'App\Http\Controllers\CtesController@detalhesCte');
Route::post('/cte-enviar', 'App\Http\Controllers\CtesController@manter');
Route::get('/ctes/editarcte', 'App\Http\Controllers\CtesController@editarCte');


/* Clientes */
Route::get('/novocliente', 'App\Http\Controllers\ClientesController@novoCliente');
Route::get('/novoclientepop', 'App\Http\Controllers\ClientesController@novoClientePop');
Route::post('/cliente-enviar', 'App\Http\Controllers\ClientesController@manter');

/* CONTATOS */
//get
Route::get('/contatos', 'App\Http\Controllers\ContatosController@index');
Route::get('/contatos/{id}', 'App\Http\Controllers\ContatosController@show');
Route::get('/contatos/novocontato', 'App\Http\Controllers\ContatosController@novoContato');
Route::get('/contatos/detalhescontato', 'App\Http\Controllers\ContatosController@detalhesContato');
Route::get('/contatos/editarcontato', 'App\Http\Controllers\ContatosController@editarContato');

//post
Route::post('/contato-enviar', 'App\Http\Controllers\ContatosController@manter');

/* DESPESAS */
//get
Route::get('/despesas', 'App\Http\Controllers\DespesasController@index');
Route::get('/despesas/novadespesa', 'App\Http\Controllers\DespesasController@novaDespesa');
Route::get('/despesas/editardespesa', 'App\Http\Controllers\DespesasController@editarDespesa');
Route::get('/despesas/detalhesdespesa', 'App\Http\Controllers\DespesasController@detalhesDespesa');

//post
Route::post('/despesa-enviar', 'App\Http\Controllers\DespesasController@manter');




