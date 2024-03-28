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
        Permission::create(['name' => 'app-users-create']);
        Permission::create(['name' => 'app-users-read']);
        Permission::create(['name' => 'app-users-update']);
        Permission::create(['name' => 'app-users-delete']);
        //Permission
        Permission::create(['name' => 'app-permissions-create']);
        Permission::create(['name' => 'app-permissions-read']);
        Permission::create(['name' => 'app-permissions-update']);
        Permission::create(['name' => 'app-permissions-delete']);
        //Roles
        Permission::create(['name' => 'app-roles-read']);
        Permission::create(['name' => 'app-roles-update']);

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
        $managerRole->givePermissionTo([
            'app-users-create',
            'app-users-read',
            'app-users-update',
            'app-users-delete',
            'app-permissions-read',
            'app-permissions-update',
            'app-roles-read',
        ]);
        $collabRole->givePermissionTo([
            'app-users-read',
            'app-permissions-read',
            'app-roles-read',
        ]);
        //$userRole->givePermissionTo([]);
    }
}
