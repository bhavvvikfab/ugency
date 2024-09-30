<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::firstOrCreate(['name' => 'clients','guard_name'=>'web']);
        Role::firstOrCreate(['name' => 'client admin','guard_name'=>'web']);
        Role::firstOrCreate(['name' => 'client employee','guard_name'=>'web']);
        Role::firstOrCreate(['name' => 'creators','guard_name'=>'web']);
    }
}
