<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'Admin')->first();
        $role_user = Role::where('name', 'User')->first();

        $admin = new User();
        $admin->name = 'Aifa Nur Amalia';
        $admin->email = 'aifa.nur.amalia@gmail.com';
        $admin->password = bcrypt('123456789');
        $admin->birth_date = '2020-01-01';
        $admin->save();
        $admin->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Anisa Nur Zakiya';
        $user->email = 'anisa@gmail.com';
        $user->password = bcrypt('12345678');
        $admin->birth_date = '2020-01-01';
        $user->save();
        $user->roles()->attach($role_user);
    }
}
