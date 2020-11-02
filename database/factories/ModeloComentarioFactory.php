<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\ModeloComentario;
use App\Models\ModeloProducto;
use App\Models\ModeloPersona;
use Faker\Generator as Faker;


$factory->define(App\Models\ModeloComentario::class, function (Faker $faker) {
    return [
        
        'comentario'=>$faker->sentence(4),
        'id_persona'=>App\Models\ModeloPersona::get('id')->random(),
        'id_producto'=>App\Models\ModeloProducto::get('id')->random()
    ];
});
