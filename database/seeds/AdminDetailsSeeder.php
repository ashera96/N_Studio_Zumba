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
        $admin->password=Hash::make('123123');
        $admin->status=true;
        $admin->role_id=1;

        $admin->save();
    }
}
