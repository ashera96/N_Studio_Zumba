<?php

use Illuminate\Database\Seeder;

class ScheduleCountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s1 = new App\ScheduleCount;
        $s2 = new App\ScheduleCount;
        $s3 = new App\ScheduleCount;
        $s4 = new App\ScheduleCount;
        $s5 = new App\ScheduleCount;
        $s6 = new App\ScheduleCount;
        $s7 = new App\ScheduleCount;
        $s8 = new App\ScheduleCount;
        $s9 = new App\ScheduleCount;
        $s10 = new App\ScheduleCount;
        $s11 = new App\ScheduleCount;
        $s12 = new App\ScheduleCount;

        $s1->schedule_id = 1;
        $s1->save();

        $s2->schedule_id = 2;
        $s2->save();

        $s3->schedule_id = 3;
        $s3->save();

        $s4->schedule_id = 4;
        $s4->save();

        $s5->schedule_id = 5;
        $s5->save();

        $s6->schedule_id = 6;
        $s6->save();

        $s7->schedule_id = 7;
        $s7->save();

        $s8->schedule_id = 8;
        $s8->save();

        $s9->schedule_id = 9;
        $s9->save();

        $s10->schedule_id = 10;
        $s10->save();

        $s11->schedule_id = 11;
        $s11->save();

        $s12->schedule_id = 12;
        $s12->save();

    }
}
