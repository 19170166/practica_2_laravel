<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public function productos()
    {
        return $this->hasMany('app/Comentarios');
    }
}
