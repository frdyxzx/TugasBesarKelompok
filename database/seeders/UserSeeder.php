<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $owner = User::create([
            'name' => 'Owner',
            'email' => 'owner@gmail.com',
            'password' => bcrypt('password123'),
        ]);

        $owner->assignRole('owner');

        $manajer = User::create([
            'name' => 'Manajer',
            'email' => 'manajer@gmail.com',
            'password' => bcrypt('password123'),
        ]);

        $manajer->assignRole('manajer');

        $supervisor = User::create([
            'name' => 'Supervisor',
            'email' => 'supervisor@gmail.com',
            'password' => bcrypt('password123'),
        ]);

        $supervisor->assignRole('supervisor');

        $kasir = User::create([
            'name' => 'Kasir',
            'email' => 'kasir@gmail.com',
            'password' => bcrypt('password123'),
        ]);

        $kasir->assignRole('kasir');

        $gudang = User::create([
            'name' => 'Gudang',
            'email' => 'gudang@gmail.com',
            'password' => bcrypt('password123'),
        ]);

        $gudang->assignRole('gudang');
    }
}
