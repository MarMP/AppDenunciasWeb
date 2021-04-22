<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $this->truncateTable([
            'departamentos',
            'tipo_comunicacion',
            'empleados',
            'administradores'
        ]);
        /**
         * Llama a las clases seeder para realizar los cambios
         */
        $this->call([
            DepartamentosSeeder::class,
            TipoComunicacionSeeder::class,
            EmpleadosSeeder::class,
            AdministradoresSeeder::class,
        ]);

        /**
         * La función elimina los registros sin tener en cuenta las claves foráneas para evitar error
         * pero después las vuelve a activar una vez que se borran las tablas.
         */
    }

    protected function truncateTable(array $tables) {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        foreach ($tables as $table){
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
