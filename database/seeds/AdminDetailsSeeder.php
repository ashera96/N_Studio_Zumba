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
        $admin = new App\Admin;

        $admin->username="Admin";
        $admin->email="nstudioz950@gmail.com";
        $admin->password=Hash::make('123123');

        $admin->save();
    }
}
