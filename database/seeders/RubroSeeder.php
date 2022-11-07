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
            'name' => 'Rubro 1',            
        ]);

        DB::table('rubros')->insert([
            'name' => 'Rubro 2',            
        ]);

        DB::table('rubros')->insert([
            'name' => 'Rubro 3',            
        ]);

        DB::table('rubros')->insert([
            'name' => 'Rubro 4',            
        ]);

        DB::table('rubros')->insert([
            'name' => 'Rubro 5',            
        ]);
    }
}
