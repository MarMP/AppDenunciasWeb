<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class DepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        DB::table('departamentos')->insert([
            'departamento'=>'Marketing',
        ]);

        DB::table('departamentos')->insert([
            'departamento'=>'Desarrollo',
        ]);

        DB::table('departamentos')->insert([
            'departamento'=>'Soporte',
        ]);

    }
    
}
