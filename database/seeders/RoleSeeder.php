<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     /* para agregar un nuevo role se tiene que ir agregando uno por uno lo que esta comentado*/
    public function run()

    {
        DB::table('roles')->insert([
            'name' => 'admin',            
        ]);

       /**DB::table('roles')->insert([
            'name' => 'admin',            
       ]);*/

       DB::table('roles')->insert([
        'name' => 'usuario',            
    ]);
    }
}
