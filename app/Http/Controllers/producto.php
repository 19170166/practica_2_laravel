<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class producto extends Controller
{
    public function mostrar_todos_productos(){
        $producto = DB::table('productos')->select('nombre_producto')->get();
        //$producto = DB::table('productos')->get();
        return $producto;
    }
    public function mostrar_todos_comentarios(){
        $comentario=DB::table('Comentarios')
        ->join('productos','comentarios.id_producto','=','productos.id')
        ->select('comentarios.*','productos.nombre_producto')
        ->get();
        return $comentario;
    }
    public function comentarios_de_productos(){
        $com_pro=DB::table('Comentarios')
        ->join('productos','comentarios.id_producto','=','productos.id')
        ->select('comentarios.*','productos.nombre_producto')
        ->where('comentarios.usuario','=','angel')
        ->get();
        return $com_pro;
    }
    public function producto_comentarios(){
        $com_pro=DB::table('Comentarios')
        ->join('productos','comentarios.id_producto','=','productos.id')
        ->select('comentarios.*')
        ->where('productos.nombre_producto','=','pluma')
        ->get();
        return $com_pro;
    }
    public function guardarproducto(){

    }
}
