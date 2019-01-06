<?php

use Illuminate\Database\Seeder;

class FlagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $flag1 = new App\Flag;
        $flag2 = new App\Flag;

        $flag1->id = 1;
        $flag1->value = 0;
        $flag1->save();

        $flag2->id = 2;
        $flag2->value = 0;
        $flag2->save();

    }
}
