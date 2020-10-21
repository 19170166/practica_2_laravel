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
    protected $fillable = ['comentario','usuario','id_producto'];
    
    public function comentarios()
    {
        return $this->hasOne('Models\ModeloProducto');
    }
}
