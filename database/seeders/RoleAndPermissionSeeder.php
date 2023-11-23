<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        /***--PERMISSIONS--***/
        Permission::create(['name' => 'app-super-admin']);
        //Users
        Permission::create(['name' => 'app-create-users']);
        Permission::create(['name' => 'app-read-users']);
        Permission::create(['name' => 'app-update-users']);
        Permission::create(['name' => 'app-delete-users']);
        //Permission
        Permission::create(['name' => 'app-create-permissions']);
        Permission::create(['name' => 'app-read-permissions']);
        Permission::create(['name' => 'app-update-permissions']);
        Permission::create(['name' => 'app-delete-permissions']);
        //Roles
        Permission::create(['name' => 'app-read-roles']);
        Permission::create(['name' => 'app-update-roles']);

        /***--ROLES--***/
        $superAdminRole = Role::create(['name' => 'SuperAdmin']); // GATE Auth returns "true" for all permissions //
        $adminRole = Role::create(['name' => 'Admin']);
        $managerRole = Role::create(['name' => 'Manager']);
        $collabRole = Role::create(['name' => 'Collab']);
        $userRole = Role::create(['name' => 'User']);

        /***--Asign Permissions to Roles--***/
        $superAdminRole->givePermissionTo([
            'app-super-admin',
        ]);
        $adminRole->givePermissionTo([
            'app-create-users',
            'app-read-users',
            'app-update-users',
            'app-delete-users',
            'app-create-permissions',
            'app-read-permissions',
            'app-update-permissions',
            'app-delete-permissions',
            'app-read-roles',
            'app-update-roles',
        ]);
        $managerRole->givePermissionTo([
            'app-create-users',
            'app-read-users',
            'app-update-users',
            'app-delete-users',
            'app-read-permissions',
            'app-update-permissions',
            'app-read-roles',
        ]);
        $collabRole->givePermissionTo([
            'app-read-users',
            'app-read-permissions',
            'app-read-roles',
        ]);
        //$userRole->givePermissionTo([]);
    }
}
