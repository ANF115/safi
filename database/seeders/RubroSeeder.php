<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RubroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rubros')->insert([
            'name' => 'Restaurantes de comida rápida',            
        ]);

        DB::table('rubros')->insert([
            'name' => 'Tecnología',            
        ]);

        DB::table('rubros')->insert([
            'name' => 'Hoteles',            
        ]);

        DB::table('rubros')->insert([
            'name' => 'Servicios Varios',            
        ]);

        DB::table('rubros')->insert([
            'name' => 'Minería',            
        ]);
    }
}
