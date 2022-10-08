<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Diego',            
            'email' => 'admin1@email.com',
            'password' => Hash::make('password'),
            'role_id' => 1,            
        ]);


        DB::table('users')->insert([
            'name' => 'Carolina',            
            'email' => 'admin2@email.com',
            'password' => Hash::make('password'),
            'role_id' => 1,            
        ]);

        DB::table('users')->insert([
            'name' => 'Andrea',
            'email' => 'admin3@email.com',
            'password' => Hash::make('password'),
            'role_id' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'Ronald',
            'email' => 'admin4@email.com',
            'password' => Hash::make('password'),
            'role_id' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Monica',
            'email' => 'admin5@email.com',
            'password' => Hash::make('password'),
            'role_id' => 1
        ]);
    }
}
