<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalculoSubCuentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('calculo_sub_cuentas')->insert([
            'nombre_calculo_subcuenta' => 'Gastos Financieros',            
        ]);
        DB::table('calculo_sub_cuentas')->insert([
            'nombre_calculo_subcuenta' => 'Inventario',            
        ]);
        DB::table('calculo_sub_cuentas')->insert([
            'nombre_calculo_subcuenta' => 'Cuentas por pagar',            
        ]);
        DB::table('calculo_sub_cuentas')->insert([
            'nombre_calculo_subcuenta' => 'Costo de Venta',            
        ]);
        DB::table('calculo_sub_cuentas')->insert([
            'nombre_calculo_subcuenta' => 'Cuentas por cobrar',            
        ]);
    }
}
