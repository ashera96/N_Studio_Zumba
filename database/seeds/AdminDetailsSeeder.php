<?php

use Illuminate\Database\Seeder;

class AdminDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new App\SystemUser;

        $admin->username="Admin";
        $admin->email="nstudioz950@gmail.com";
        $admin->password=Hash::make('Nstudio3*');
        $admin->role_id=2;
        $admin->id=1000;

        $admin->save();
    }
}
