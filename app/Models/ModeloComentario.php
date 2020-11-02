<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModeloComentario extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comentarios';
    public $timestamps = false;
    protected $fillable = ['comentario','id_persona','id_producto'];
    
    public function producto()
    {
        //return $this->belongsTo('App\Models\ModeloProducto','id');
        return $this->hasOne('App\Models\ModeloProducto','id');
    }
    public function persona()
    {
        //return $this->belongsTo('App\Models\ModeloPersona','id');
        return $this->hasOne('App\Models\ModeloPersona','id');
    }
}
