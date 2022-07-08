<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'image' => 'cat.jpg',
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'username' => 'admin',
            'password' => bcrypt('password'),
            'admin' => true,
            
        ]);

        $user->assignRole('Admin');

        $user = User::create([
            'image' => 'cat2.jpg',
            'name' => 'ElMATI',
            'email' => 'mati@mati.com',
            'username' => 'mati',
            'password' => bcrypt('asas123'),
            'admin' => false,
        ]);

        $user->assignRole('User');
    }

    
}
