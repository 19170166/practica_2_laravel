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
Route::middleware('checkvendedor')->get('/vendedor/productos',function (Request $request){
    
});

Route::get('/mostrarproducto/{id?}','ProductoController@mostrarproducto')->where("id","[0-9]+");
Route::get('/mostrarcomentario/{usuario?}','ComentarioController@mostrarcomentario')->where("usuario","[0-9]+");
Route::get('/mostrarpersonas/{id?}','PersonaController@mostrarpersona')->where("id","[0-9]+");
Route::get('/mostrarcomentario2/{persona?}','ComentarioController@mostrarcomentario2')->where("id","[0-9]+");
Route::middleware('auth:sanctum')->get('usuario','UsuarioController@inicio');

Route::post('/agregarproducto','ProductoController@agregarproducto');
Route::post('/agregarcomentario','ComentarioController@agregarcomentario');
Route::post('/agregarpersona','PersonaController@agregarpersona');
Route::post('/registro','UsuarioController@registro');
Route::post('/login','UsuarioController@login');

Route::put('/modificarproducto/{id}','ProductoController@modificarproducto');
Route::put('/modificarcomentario/{id}','ComentarioController@modificarcomentario');
Route::put('/modificarpersona/{id}','PersonaController@modificarpersona');


Route::delete('/borrarproducto/{id}','ProductoController@borrarproducto');
Route::delete('/borrarcomentario/{id}','ComentarioController@borrarcomentario');
Route::delete('/borrarpersona/{id}','PersonaController@borrarpersona');
Route::middleware('auth:sanctum')->delete('/logout','UsuarioController@logout');