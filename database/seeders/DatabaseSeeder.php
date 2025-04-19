<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */ 
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('admin')
        ]);

        User::create([
            'name' => 'wali_kelas1a',
            'email' => 'walikelas1a@gmail.com',
            'role' => 'Wali Kelas',
            'password' => bcrypt('wali_kelas1a')
        ]);

        User::create([
            'name' => 'orangtua1',
            'email' => 'orangtua1@gmail.com',
            'role' => 'Orang Tua',
            'password' => bcrypt('ortu1')
        ]);

    }
}
