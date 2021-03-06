<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'Admin';
        $role_admin->description = 'Dashboard, kelola lamaran, kelola user, kelola pekerjaan.';
        $role_admin->save();

        $role_user = new Role();
        $role_user->name = 'User';
        $role_user->description = 'Register, login, dashboard, lamar pekerjaan.';
        $role_user->save();
    }
}
