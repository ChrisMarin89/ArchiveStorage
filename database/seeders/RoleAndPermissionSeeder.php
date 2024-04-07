<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        /***--PERMISSIONS--***/
        Permission::create(['name' => 'app-super-admin', 'created_by' => 'System', 'updated_by' => 'System']);
        //Users
        Permission::create(['name' => 'app-users-create', 'created_by' => 'System', 'updated_by' => 'System']);
        Permission::create(['name' => 'app-users-read', 'created_by' => 'System', 'updated_by' => 'System']);
        Permission::create(['name' => 'app-users-update', 'created_by' => 'System', 'updated_by' => 'System']);
        Permission::create(['name' => 'app-users-delete', 'created_by' => 'System', 'updated_by' => 'System']);
        //Permissions
        Permission::create(['name' => 'app-permissions-create', 'created_by' => 'System', 'updated_by' => 'System']);
        Permission::create(['name' => 'app-permissions-read', 'created_by' => 'System', 'updated_by' => 'System']);
        Permission::create(['name' => 'app-permissions-update', 'created_by' => 'System', 'updated_by' => 'System']);
        Permission::create(['name' => 'app-permissions-delete', 'created_by' => 'System', 'updated_by' => 'System']);
        //Roles
        Permission::create(['name' => 'app-roles-read', 'created_by' => 'System', 'updated_by' => 'System']);
        Permission::create(['name' => 'app-roles-update', 'created_by' => 'System', 'updated_by' => 'System']);
        //Web Normal permission demo
        Permission::create(['name' => 'web-in-invoices', 'created_by' => 'System', 'updated_by' => 'System']);
        Permission::create(['name' => 'web-out-invoices', 'created_by' => 'System', 'updated_by' => 'System']);
        Permission::create(['name' => 'web-in-deliverynotes', 'created_by' => 'System', 'updated_by' => 'System']);
        Permission::create(['name' => 'web-out-deliverynotes', 'created_by' => 'System', 'updated_by' => 'System']);
        Permission::create(['name' => 'web-in-letters', 'created_by' => 'System', 'updated_by' => 'System']);
        Permission::create(['name' => 'web-out-letters', 'created_by' => 'System', 'updated_by' => 'System']);


        /***--ROLES--***/
        //SuperAdmin
        Role::create(['name' => 'SuperAdmin', 'created_by' => 'System', 'updated_by' => 'System'])
                ->givePermissionTo('app-super-admin');
        //Admin
        Role::create(['name' => 'Admin', 'created_by' => 'System', 'updated_by' => 'System'])
                ->givePermissionTo([
                    'app-users-create',
                    'app-users-read',
                    'app-users-update',
                    'app-users-delete',
                    'app-permissions-create',
                    'app-permissions-read',
                    'app-permissions-update',
                    'app-permissions-delete',
                    'app-roles-read',
                    'app-roles-update',
                ]);
        //Manager
        Role::create(['name' => 'Manager', 'created_by' => 'System', 'updated_by' => 'System'])
                ->givePermissionTo([
                    'app-users-create',
                    'app-users-read',
                    'app-users-update',
                    'app-users-delete',
                    'app-permissions-read',
                    'app-permissions-update',
                    'app-roles-read',
                ]);
        //Collab
        Role::create(['name' => 'Collab', 'created_by' => 'System', 'updated_by' => 'System'])
                ->givePermissionTo([
                    'app-users-read',
                    'app-permissions-read',
                    'app-roles-read',
                ]);
        //User
        Role::create(['name' => 'User', 'created_by' => 'System', 'updated_by' => 'System']);

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    }
}
