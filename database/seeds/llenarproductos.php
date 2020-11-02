<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
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
        
        /*$faker=Faker::create();
        foreach(range(1,10) as $index){
            
        }*/
        $pro=factory(App\Models\ModeloProducto::class,15)->create();
        
    }
}
