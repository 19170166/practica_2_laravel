<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class llenarpersonas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$faker=Faker::create();
        foreach(range(1,15)as $persona){
            DB::table('personas')->insert([
                'nombre'=>$faker->name(),
                'correo'=>$faker->unique()->safeEmail(),
                'password'=>Hash::make("123456789")
            ]);
        }*/
        $per=factory(App\Models\ModeloPersona::class,15)->create();
    }
}
