<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ModeloPersona;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\MessageBag;



class UsuarioController extends Controller
{
    public function inicio(Request $request){
        if($request->user()->tokenCan('user:info')&&$request->user()->tokenCan('admin:admin'))
        return response()->json(["users"=>Persona::all()],200);
        if($request->user()->tokenCan('user:info'))
        return response()->json(["profile"=>$request->user(),200]);
        abort(401,"Invalido");
    }
    
    public function registro(Request $request){
        
        $request->validate([
            'nombre'=>'required',
            'correo'=>'required|email',
            'password'=>'required'
        ]);

        $usuario=new ModeloPersona();
        $usuario->nombre=$request->nombre;
        $usuario->correo=$request->correo;
        $usuario->password=Hash::make($request->password);

        if($usuario->save()){
            return response()->json($usuario,200);
        }
        return response()->json('error al registrar');
    }

    public function login(Request $request){
        $request->validate([
            'correo'=>'required|email',
            'password'=>'required'
        ]);
        $usuario=ModeloPersona::where('correo',$request->correo)->first();

        if(!$usuario || !Hash::check($request->password,$usuario->password)){
            throw ValidationException::withMessages([
                'correo|password'=>['Datos incorrectos...']
            ]);
        }
        $token=$usuario->createToken($request->correo,['user','admin','vendedor'])->plainTextToken;
        return response()->json(['token'=>$token],201);
    }

    public function logout(Request $request){
        return response()->json(['Token Afectados'=>$request->user()->tokens()->delete()],200);
    }
}
