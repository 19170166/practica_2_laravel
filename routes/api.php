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

Route::get('producto','producto@mostrar_todos_productos');
Route::get('producto/comentarios','producto@mostrar_todos_comentarios');
Route::get('producto/articulo','producto@comentarios_de_productos');
Route::get('producto/comentario','producto@producto_comentarios');