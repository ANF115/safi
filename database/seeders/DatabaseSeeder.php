<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // cada vez que se cree un nuevo seeder se tiene que agregar aca
        $this->call([
            RoleSeeder::class,
            UserSeeder::class
            
        ]);
    }
}
