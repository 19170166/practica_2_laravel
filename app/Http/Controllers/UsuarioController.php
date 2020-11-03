<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ModeloPersona;
use App\Models\ModeloProducto;
use App\ModeloToken;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\MessageBag;
use App\User;

class UsuarioController extends Controller
{

    public function iniciaradmin(Request $request){
        $admin=ModeloPersona::find(1);
        //return response()->json([$admin]);
        if($request->correo==$admin->correo && Hash::check($request->password,$admin->password)){
        $token=$admin->createToken($request->correo,['administrador'])->plainTextToken;
        return response()->json(['token'=>$token],201);
        }
    }

    public function identificador(Request $request){
        if($request->user()->tokenCan('administrador')){
        return response()->json(["eres un administrador"=>ModeloPersona::all()],200);}
        if($request->user()->tokenCan('usuario:cliente')){
        return response()->json(["eres un usuario"=>$request->user(),200]);}
        if($request->user()->tokenCan('usuario:vendedor')){
        return response()->json(["eres un vendedor"=>ModeloProducto::all()],200);}
        abort(401,"Invalido");
    }

    public function modificarpermisos(Request $request){
        if($request->user()->tokenCan('administrador')){
            $tok=ModeloToken::where('email',$request->correo)->first();
            return response()->json($tok);
            $tok->abilities=$request->abilities;
            if($tok->save()){
            return response()->json('permiso modificado');
            }
        }
    }

    //mostrar productos
    public function usuario(Request $request){
        if($request->user()->tokenCan('usuario:cliente','usuario:vendedor')){
            return response()->json(["productos",ModeloProducto::all()]);
        }
    }
    //agregar producto
    public function agregarpro(Request $request){
        //dd($request);
        $user=new ModeloPersona();
        dd($user->tokens);
        $producto=new ModeloProducto();
        if($request->user()->tokenCan('usuario:vendedor')){
            $producto->nombre_producto=$request->nombre_producto;
            $producto->save();
            return response()->json(["producto agregado"]);
        }
        else{return response()->json(['no eres un vendedor']);}
    }
    //modificar producto

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
        /*$user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password; */  
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
        $token=$usuario->createToken($request->correo,['usuario:cliente'])->plainTextToken;
        return response()->json(['token'=>$token],201);
    }
    
    public function loginvendedor(Request $request){
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
        $token=$usuario->createToken($request->correo,['usuario:vendedor'])->plainTextToken;
        return response()->json(['token'=>$token],201);
    }

    public function logout(Request $request){
        return response()->json(['Token Afectados'=>$request->user()->tokens()->delete()],200);
    }
}
