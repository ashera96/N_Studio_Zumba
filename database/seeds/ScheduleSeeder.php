<?php

use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s1 = new App\Schedule;
        $s2 = new App\Schedule;
        $s3 = new App\Schedule;
        $s4 = new App\Schedule;
        $s5 = new App\Schedule;
        $s6 = new App\Schedule;
        $s7 = new App\Schedule;
        $s8 = new App\Schedule;
        $s9 = new App\Schedule;
        $s10 = new App\Schedule;
        $s11 = new App\Schedule;
        $s12 = new App\Schedule;

        $s1->type= 'Zumba & Workout';
        $s1->day= 'Monday';
        $s1->time_slot= '8.00 AM-10.00 AM';
        $s1->client_limit= 30;
        $s1->save();

        $s2->type= 'Zumba & Workout';
        $s2->day= 'Monday';
        $s2->time_slot= '6.00 AM-8.00 AM';
        $s2->client_limit= 30;
        $s2->save();

        $s3->type= 'Zumba & Workout';
        $s3->day= 'Tuesday';
        $s3->time_slot= '8.00 AM-10.00 AM';
        $s3->client_limit= 30;
        $s3->save();

        $s4->type= 'Zumba & Workout';
        $s4->day= 'Tuesday';
        $s4->time_slot= '6.00 AM-8.00 AM';
        $s4->client_limit= 30;
        $s4->save();

        $s5->type= 'Zumba & Workout';
        $s5->day= 'Wednesday';
        $s5->time_slot= '8.00 AM-10.00 AM';
        $s5->client_limit= 30;
        $s5->save();

        $s6->type= 'Zumba & Workout';
        $s6->day= 'Wednesday';
        $s6->time_slot= '6.00 AM-8.00 AM';
        $s6->client_limit= 30;
        $s6->save();

        $s7->type= 'Zumba & Workout';
        $s7->day= 'Thursday';
        $s7->time_slot= '8.00 AM-10.00 AM';
        $s7->client_limit= 30;
        $s7->save();

        $s8->type= 'Zumba & Workout';
        $s8->day= 'Thursday';
        $s8->time_slot= '6.00 AM-8.00 AM';
        $s8->client_limit= 30;
        $s8->save();

        $s9->type= 'Zumba & Workout';
        $s9->day= 'Friday';
        $s9->time_slot= '8.00 AM-10.00 AM';
        $s9->client_limit= 30;
        $s9->save();

        $s10->type= 'Zumba & Workout';
        $s10->day= 'Friday';
        $s10->time_slot= '6.00 AM-8.00 AM';
        $s10->client_limit= 30;
        $s10->save();

        $s11->type= 'Workout';
        $s11->day= 'Saturday';
        $s11->time_slot= '9.00 AM-11.00 AM';
        $s11->client_limit= 30;
        $s11->save();

        $s12->type= 'Workout';
        $s12->day= 'Sunday';
        $s12->time_slot= '9.00 AM-11.00 AM';
        $s12->client_limit= 30;
        $s12->save();

    }
}
