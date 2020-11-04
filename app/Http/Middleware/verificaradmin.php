<?php

namespace App\Http\Middleware;
use App\Models\ModeloPersona;
use Illuminate\Support\Facades\Hash;

use Closure;

class verificaradmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   

        $admin=ModeloPersona::find(1)->first();
        //dd($admin);
        if($admin->correo==$request->correo&&Hash::check($request->password,$admin->password)){
            return $next($request);
        }
        return abort(400,'No tiene permiso para acceder');
        
    }
}
