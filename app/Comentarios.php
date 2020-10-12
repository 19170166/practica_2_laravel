<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    public function comentarios()
    {
        return $this->hasOne('app\Producto');
    }
    
}
