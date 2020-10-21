<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModeloProducto extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'productos';
    public $timestamps = false;
    protected $fillable = ['nombre_producto'];

    public function productos()
    {
        return $this->hasMany('Models/ModeloComentario');
    }
}
