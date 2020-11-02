<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\ModeloProducto::class, function (Faker $faker) {
    return [
        'nombre_producto'=>$faker->sentence(2)
    ];
});
