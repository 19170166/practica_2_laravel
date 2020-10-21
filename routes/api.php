<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('producto','producto@mostrar_todos_productos');
//Route::get('producto/comentarios','producto@mostrar_todos_comentarios');
//Route::get('producto/articulo','producto@comentarios_de_productos');
//Route::get('producto/comentario','producto@producto_comentarios');
Route::get('/mostrarproducto/{id?}','ProductoController@mostrarproducto')->where("id","[0-9]+");
Route::get('/mostrarcomentario/{usuario?}','ComentarioController@mostrarcomentario')->where("usuario","[a-z]+");
Route::post('/agregarproducto','ProductoController@agregarproducto');
Route::post('/agregarcomentario','ComentarioController@agregarcomentario');
Route::put('/modificarproducto/{id}','ProductoController@modificarproducto');
Route::put('/modificarcomentario/{id}','ComentarioController@modificarcomentario');
Route::delete('/borrarproducto/{id}','ProductoController@borrarproducto');
Route::delete('/borrarcomentario/{id}','ComentarioController@borrarcomentario');