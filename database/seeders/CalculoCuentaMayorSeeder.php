<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalculoCuentaMayorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('calculo_cuenta_mayors')->insert([
            'nombre_calculo_cuenta_mayor' => 'Activos',            
        ]);
        DB::table('calculo_cuenta_mayors')->insert([
            'nombre_calculo_cuenta_mayor' => 'Pasivos',            
        ]);
        DB::table('calculo_cuenta_mayors')->insert([
            'nombre_calculo_cuenta_mayor' => 'Capital',            
        ]);
    }
}
