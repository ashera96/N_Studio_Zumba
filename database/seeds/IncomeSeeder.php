<?php

use Illuminate\Database\Seeder;

class IncomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $income1 = new App\Income;
        $income2 = new App\Income;
        $income3 = new App\Income;
        $income4 = new App\Income;
        $income5 = new App\Income;
        $income6 = new App\Income;

        $income1->year = '2018';
        $income1->month = 'July';
        $income1->amount = '35000';
        $income1->save();

        $income2->year = '2018';
        $income2->month = 'August';
        $income2->amount = '48500';
        $income2->save();

        $income3->year = '2018';
        $income3->month = 'September';
        $income3->amount = '50000';
        $income3->save();

        $income4->year = '2018';
        $income4->month = 'October';
        $income4->amount = '48000';
        $income4->save();

        $income5->year = '2018';
        $income5->month = 'November';
        $income5->amount = '56000';
        $income5->save();

        $income6->year = '2018';
        $income6->month = 'December';
        $income6->amount = '62500';
        $income6->save();

    }
}
