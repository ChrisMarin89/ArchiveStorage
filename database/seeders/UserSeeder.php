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
        $SuperAdmin = new User();
        $SuperAdmin->name = 'Chris';
        $SuperAdmin->lastname = 'Marin';
        $SuperAdmin->email = 'cmarin.mail@gmail.com';
        $SuperAdmin->lang = 'en';
        $SuperAdmin->password = bcrypt('Chris.123');
        $SuperAdmin->created_by = 'System';
        $SuperAdmin->updated_by = 'System';
        $SuperAdmin->assignRole('SuperAdmin');
        $SuperAdmin->save();

        $Admin = new User();
        $Admin->name = 'Chris';
        $Admin->lastname = 'Marin';
        $Admin->email = 'admin@admin.com';
        $Admin->lang = 'en';
        $Admin->password = bcrypt('Chris.123');
        $Admin->created_by = 'System';
        $Admin->updated_by = 'System';
        $Admin->assignRole('Admin');
        $Admin->save();

        $Manager = new User();
        $Manager->name = 'Chris';
        $Manager->lastname = 'Marin';
        $Manager->email = 'manager@manager.com';
        $Manager->lang = 'en';
        $Manager->password = bcrypt('Chris.123');
        $Manager->created_by = 'System';
        $Manager->updated_by = 'System';
        $Manager->assignRole('Manager');
        $Manager->save();

        $Collab = new User();
        $Collab->name = 'Chris';
        $Collab->lastname = 'Marin';
        $Collab->email = 'collab@collab.com';
        $Collab->lang = 'en';
        $Collab->password = bcrypt('Chris.123');
        $Collab->created_by = 'System';
        $Collab->updated_by = 'System';
        $Collab->assignRole('Collab');
        $Collab->save();

        $User = new User();
        $User->name = 'Chris';
        $User->lastname = 'Marin';
        $User->email = 'user@user.com';
        $User->lang = 'en';
        $User->password = bcrypt('Chris.123');
        $User->created_by = 'System';
        $User->updated_by = 'System';
        $User->assignRole('User');
        $User->save();
    }
}
