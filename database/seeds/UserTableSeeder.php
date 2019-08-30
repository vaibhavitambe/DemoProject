<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$role_user = Role::where('name','User')->first();
    	$role_admin = Role::where('name','Admin')->first();

        $user = new User();
        $user->firstname = 'victor';
        $user->lastname = 'visitor';
        $user->email = 'visitor@example.com';
        $user->password = bcrypt('visitor');
        $user->save();
        $user->roles()->attach($role_user);

        $admin = new User();
        $admin->firstname = 'vaibhavi';
        $admin->lastname = 'tambe';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('admin');
        $admin->save();
        $user->roles()->attach($role_admin);
    }
}
