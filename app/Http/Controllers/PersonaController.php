<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use App\Models\ModeloPersona;
use App\Models\ModeloComentario;

class PersonaController extends Controller
{
    
    public function mostrarpersona($id=null){
        if($id!=null){
            return response()->json(["Persona",ModeloPersona::all("id","nombre","correo")->find($id)]);
        }
        return response()->json(["Personas",ModeloPersona::all("nombre","correo")]);
    }

    public function agregarpersona(Request $request){
        $persona=new ModeloPersona();
        $persona->nombre=$request->nombre;
        $persona->correo=$request->correo;
        $persona->password=Hash::make($request->password);
        $persona->save();
    }

    public function modificarpersona(Request $request,$id){
        $persona=ModeloPersona::find($id);

        if($request->nombre!=null)
            $persona->update(['nombre'=>$request->nombre]);
        elseif($request->correo!=null)
            $persona->update(['correo'=>$request->correo]);
        elseif($request->password!=null)
            $persona->update(['passsword'=>$request->password]);
        $persona->save();
    }

    public function borrarpersona($id){
        $comentario=ModeloComentario::where('id_persona','=',$id);
        $comentario->delete();
        $persona=ModeloPersona::find($id);
        $persona->delete();
    }

}
