<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;


class ModeloPersona extends Model
{
    use HasApiTokens, Notifiable;
    protected $table='personas';
    public $timestamps=false;
    protected $fillable=['nombre','correo','password'];

    public function comentario(){
        return $this->hasMany('App\Models\ModeloComentario','id_persona');
    }
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

}
