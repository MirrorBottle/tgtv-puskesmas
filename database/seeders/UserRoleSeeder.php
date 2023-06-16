<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::find(1);
        $user = Role::find(2);

        $userAdmin = User::find(1)->assignRole($admin);
        $userPenyelia = User::find(2)->assignRole($user);
        $userPenyelia = User::find(3)->assignRole($user);
        $userPenyelia = User::find(4)->assignRole($user);
        $userPenyelia = User::find(5)->assignRole($user);
        $userPenyelia = User::find(6)->assignRole($user);


    }
}
