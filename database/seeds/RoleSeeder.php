<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = new App\Role;
        $role2 = new App\Role;
        $role3 = new App\Role;

        $role1-> name = 'admin';
        $role2-> name = 'customer';
        $role3-> name = 'receptionist';

        $role1->save();
        $role2->save();
        $role3->save();
    }
}
