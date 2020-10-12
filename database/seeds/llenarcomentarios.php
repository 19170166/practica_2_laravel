<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class llenarcomentarios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comentarios')->insert([
            'id'=>1,
            'comentario'=>'muy bueno',
            'usuario'=>'angel',
            'id_producto'=>1,
        ]);
        DB::table('comentarios')->insert([
            'id'=>2,
            'comentario'=>'excelente',
            'usuario'=>'abraham',
            'id_producto'=>2,
        ]);
        DB::table('comentarios')->insert([
            'id'=>3,
            'comentario'=>'pesimo',
            'usuario'=>'oscar',
            'id_producto'=>3,
        ]);
        DB::table('comentarios')->insert([
            'id'=>4,
            'comentario'=>'muy bueno',
            'usuario'=>'gonsalo',
            'id_producto'=>2,
        ]);
        DB::table('comentarios')->insert([
            'id'=>5,
            'comentario'=>'cumple su funcion',
            'usuario'=>'moises',
            'id_producto'=>1,
        ]);
        DB::table('comentarios')->insert([
            'id'=>6,
            'comentario'=>'muy bueno',
            'usuario'=>'ivan',
            'id_producto'=>3,
        ]);
    }
}
