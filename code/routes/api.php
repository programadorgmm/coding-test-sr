<?php

use Illuminate\Http\Request;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/usuarios', 'UsuarioController@index');
Route::post('/usuarios', 'UsuarioController@store');
Route::post('/usuarios/edit/{id}', 'UsuarioController@edit');
Route::post('/usuarios/delete/{id}', 'UsuarioController@destroy');
Route::get('/usuarios/{id}', 'UsuarioController@show');

Route::get('/pedidos', 'PedidoController@index');
Route::post('/pedidos', 'PedidoController@store');
Route::post('/pedidos/edit/{id}', 'PedidoController@edit');
Route::post('/pedidos/delete/{id}', 'PedidoController@delete');
Route::get('/pedidos/{id}', 'PedidoController@show');

Route::get('/produtos', 'ProdutoController@index');
Route::post('/produtos', 'ProdutoController@store');
Route::post('/produtos/edit/{id}', 'ProdutoController@edit');
Route::post('/produtos/delete/{id}', 'ProdutoController@delete');
Route::get('/produtos/{id}', 'ProdutoController@show');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
