<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
//use App\Models\ModeloProducto;

class llenarcomentarios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        /*$producto=App\Models\ModeloProducto::get(['id']);
        $persona=App\Models\ModeloPersona::get(['id']);
        $id_pro=[];$id_per=[];
        foreach($producto as $pr){
            $id_pro[]=$pr->id;
        }
        foreach($persona as $pe){
            $id_per[]=$pe->id;
        }
        $faker=Faker::create();*/
        $com=factory(App\Models\ModeloComentario::class,50)->create();

        /*foreach(range(1,50) as $index){
            DB::table('comentarios')->insert([
                'comentario'=>$faker->sentence(4),
                'id_persona'=>$faker->randomElement($id_per),
                'id_producto'=>$faker->randomElement($id_pro)
            ]);
        }*/
        /*factory(\App\Models\Plan::class, 3)->create()->each(function ($planes) {
            $planes->auditorias()->save(factory(\App\Models\Auditoria::class)->make());
        });*/
    }
}
