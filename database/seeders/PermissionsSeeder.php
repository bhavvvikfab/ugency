<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // User Management Permissions
            // 'view users', 'create users', 'edit users', 'delete users',

            // Campaign  Permissions
            'display campaign','view campaign','create campaign','edit campaign','delete campaign',

            // Campaign Request Permissions
            'display campaign request','view campaign request','create campaign request','edit campaign request','delete campaign request',

            // Agreement Permissions
            'display agreement','view agreement','create agreement','edit agreement','delete agreement',

            // Invoice Permissions
            'display invoice','view invoice','create invoice','edit invoice','delete invoice',

            // Clients Users Permissions
            'display clients user','view clients user','create clients user','edit clients user','delete clients user',

            // Address Permissions
            'display address','view address','create address','edit address','delete address',

            // Settings Permissions
            'display settings','view settings','create settings','edit settings','delete settings',

        ];

        // Create each permission if it doesn't exist
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles if they don't exist
        $clients = Role::firstOrCreate(['name' => 'clients','guard_name'=>'web']);
        $clientAdmin = Role::firstOrCreate(['name' => 'client admin','guard_name'=>'web']);
        $clientEmployee = Role::firstOrCreate(['name' => 'client employee','guard_name'=>'web']);
        $creators = Role::firstOrCreate(['name' => 'creators','guard_name'=>'web']);

        $clients->givePermissionTo(Permission::all());
        $clientAdmin->givePermissionTo(Permission::all());
        $creators->givePermissionTo(Permission::all());

        // Assign limited permissions to Client Employee
        $clientEmployee->givePermissionTo([
            'display campaign','view campaign','create campaign','edit campaign','delete campaign',
            'display campaign request','view campaign request','create campaign request','edit campaign request','delete campaign request',
            'display invoice','view invoice','create invoice','edit invoice','delete invoice',
        ]);

        // Assign content-related permissions to Creators
        // $creators->givePermissionTo([
        //     'view campaign request',
        //     'view campaign request','create campaign request','edit campaign request','delete campaign request',
        //     'view invoice','create invoice','edit invoice','delete invoice',
        // ]);

    }
}
