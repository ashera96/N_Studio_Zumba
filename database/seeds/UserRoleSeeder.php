<?php

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
        $role_customer = new App\Role;
        $role_admin = new App\Role;
        $role_receptionist = new App\Role;

        $role_customer->name="customer";
        $role_customer->save();

        $role_admin->name="admin";
        $role_admin->save();

        $role_receptionist->name="receptionist";
        $role_receptionist->save();
    }
}


