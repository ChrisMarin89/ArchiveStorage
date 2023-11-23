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
        $user = new User();
        $user->name = 'Chris';
        $user->lastname = 'Marin';
        $user->email = 'cmarin.mail@gmail.com';
        $user->password = bcrypt('Chris.123');
        $user->assignRole('SuperAdmin');
        $user->save();
    }
}
