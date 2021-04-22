<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoComunicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_comunicacion')->insert([
            'incidencia' => 'Denuncia',
        ]);

        DB::table('tipo_comunicacion')->insert([
            'incidencia' => 'Sugerencia',
        ]);

        DB::table('tipo_comunicacion')->insert([
            'incidencia' => 'Mejora',
        ]);
    }
}
