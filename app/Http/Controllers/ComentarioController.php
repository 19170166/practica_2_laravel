<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ModeloProducto;
use App\Models\ModeloPersona;
use App\Models\ModeloComentario;

class ComentarioController extends Controller
{
    public function mostrarcomentario($usuario=null){
        $com_pro=ModeloComentario::all(); 
        
        if($usuario){
            //return response()->json(["Comentarios",ModeloPersona::find($usuario)]);
            $com_pro=DB::table('personas')
            ->join('comentarios','comentarios.id_persona','=','personas.id')
            ->join('productos','productos.id','=','comentarios.id_persona')
            ->select('comentarios.comentario','personas.nombre','productos.nombre_producto')
            ->where('personas.id','=',$usuario)
            ->get();
            return $com_pro->toJson();
            /*$com_pro->load('persona','producto')->where('id_persona','=',$usuario);
            return $com_pro->toJson;*/
        }
        //return response()->json(["comentarios",ModeloComentario::get()]);
        $com_pro->load('persona','producto');
        return $com_pro->toJson();
    }

    public function mostrarcomentario2($producto){
        $com_pro=DB::table('personas')
            ->join('comentarios','comentarios.id_persona','=','personas.id')
            ->join('productos','productos.id','=','comentarios.id_persona')
            ->select('comentarios.comentario','personas.nombre','productos.nombre_producto')
            ->where('productos.id','=',$producto)
            ->get();
            return $com_pro->toJson();
    }


    public function agregarcomentario(Request $request){
        $comentario=new ModeloComentario();
        $comentario->id=$request->id;
        $comentario->comentario=$request->comentario;
        $comentario->usuario=$request->usuario;
        $comentario->id_producto=$request->id_producto;
        $comentario->save();
    }
    public function modificarcomentario(Request $request,$id){
        $comentario=ModeloComentario::find($id);
        /*$comentario->update(['comentario','=',$request->comentario,
        'usuario','=',$request->usuario,
        'id_producto','=',$request->id_producto]);*/
        if($request->comentario!=null)
            $comentario->update(['comentario'=>$request->comentario]);
        elseif($request->usuario!=null)
            $comentario->update(['usuario'=>$request->usuario]);
        elseif($request->id_producto!=null)
            $comentario->update(['id_producto'=>$request->id_producto]);
        $comentario->save();
    }
    public function borrarcomentario($id){
        $comentario=ModeloComentario::find($id);
        $comentario->delete();
    }
}
