<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class llenarproductos extends Seeder
{

        /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            'id'=>1,
            'nombre_producto'=>'pluma'
        ]);
        DB::table('productos')->insert([
            'id'=>2,
            'nombre_producto'=>'mochila'
        ]);
        DB::table('productos')->insert([
            'id'=>3,
            'nombre_producto'=>'corrector'
        ]);
    }
}
