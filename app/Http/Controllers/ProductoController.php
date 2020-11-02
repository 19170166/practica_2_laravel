<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\ModeloProducto;
use App\Models\ModeloComentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    public function mostrarproducto($id=null){
        if($id){
            return response()->json(["producto",ModeloProducto::all('id','nombre_producto')->find($id)]);
        }
        return response()->json(["productos",ModeloProducto::all()]);
        
        //return ModeloProducto::all();
    }

    public function agregarproducto(Request $request){
        $producto=new ModeloProducto();
        //$producto->id=$request->id;
        $producto->nombre_producto=$request->nombre_producto;
        $producto->save();
    }

    public function modificarproducto(Request $request,$id){
        
        $producto=ModeloProducto::find($id);
        $producto->update(['nombre_producto'=>$request->nombre_producto]);
        $producto->save();

        /*if($nom_pro){
            $query=DB::table('productos')
            ->where('id',$id)
            ->update(['nombre_producto'=>$nom_pro]);
        }*/
    }

    public function borrarproducto(Request $request,$id){
        $comentario=ModeloComentario::where('id_producto','=',$id);
        $comentario->delete();
        $producto=ModeloProducto::where('nombre_producto','=',$request->nombre_producto);
        $producto->delete();
    }

}
