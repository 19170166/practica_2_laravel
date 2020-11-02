<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\ModeloPersona::class, function (Faker $faker) {
    return [
        'nombre'=>$faker->name(),
        'correo'=>$faker->unique()->safeEmail(),
        'password'=>Hash::make("123456789")
    ];
});
