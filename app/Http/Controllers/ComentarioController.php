<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ModeloProducto;
use App\Models\ModeloComentario;

class ComentarioController extends Controller
{
    public function mostrarcomentario($usuario=null){
        if($usuario){
            //return response()->json(["comentarios",ModeloComentario::find($usuario)]);
            $com_pro=DB::table('Comentarios')
            ->join('productos','comentarios.id_producto','=','productos.id')
            ->select('comentarios.*','productos.nombre_producto')
            ->where('comentarios.usuario','=',$usuario)
            ->get();
            return $com_pro;
        }
        return response()->json(["comentarios",ModeloComentario::all()]);    
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
