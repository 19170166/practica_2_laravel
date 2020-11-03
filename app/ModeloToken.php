<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModeloToken extends Model
{
    protected $table='personal_access_tokens';
    protected $filliable='abilities';

    public function persona(){

        return $this->hasOne('App\Models\ModeloPersona','tokenable_id');

    }
}
