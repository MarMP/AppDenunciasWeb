<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class AdministradoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Genera datos falsos
        $faker = Faker::create();

        //Departamento foreing key
         $departamento = DB::table('departamentos')->select('id')->first();
  
        for ($i=0; $i < 15; $i++) {
            DB::table('administradores')->insert([
                'nombre' =>  $faker->firstName,
                'apellidos' => $faker->lastName,
                'id_departamento' => $departamento->id,
                'email' => $faker->email,
                'password' => Hash::make('password'),
            ]);
        }
    }
}
