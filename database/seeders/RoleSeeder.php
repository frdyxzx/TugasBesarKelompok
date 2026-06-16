<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::create(['name' => 'owner']);
        Role::create(['name' => 'manajer']);
        Role::create(['name' => 'supervisor']);
        Role::create(['name' => 'kasir']);
        Role::create(['name' => 'gudang']);
    }
}
