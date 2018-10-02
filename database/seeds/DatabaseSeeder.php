<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AdminDetailsSeeder::class);
        $this->call(PackageSeeder::class);
        $this->call(ScheduleSeeder::class);
    }
}
