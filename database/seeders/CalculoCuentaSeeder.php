<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalculoCuentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('calculo_cuentas')->insert([
            'nombre_calculo_cuenta' => 'Activos Corrientes',            
        ]);
        DB::table('calculo_cuentas')->insert([
            'nombre_calculo_cuenta' => 'Pasivos Corrientes',            
        ]);
        DB::table('calculo_cuentas')->insert([
            'nombre_calculo_cuenta' => 'Utilidad Neta',            
        ]);
        DB::table('calculo_cuentas')->insert([
            'nombre_calculo_cuenta' => 'Utilidad Operativa',            
        ]);
        DB::table('calculo_cuentas')->insert([
            'nombre_calculo_cuenta' => 'Utilidad Bruta',            
        ]);
        DB::table('calculo_cuentas')->insert([
            'nombre_calculo_cuenta' => 'Activo Fijo Neto',            
        ]);
    }
}
