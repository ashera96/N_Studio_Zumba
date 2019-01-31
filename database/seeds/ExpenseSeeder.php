<?php

use Illuminate\Database\Seeder;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $expense1 = new App\Expenses;
        $expense2 = new App\Expenses;
        $expense3 = new App\Expenses;
        $expense4 = new App\Expenses;
        $expense5 = new App\Expenses;
        $expense6 = new App\Expenses;

        $expense1->year = '2018';
        $expense1->month = 'July';
        $expense1->amount = '5000';
        $expense1->save();

        $expense2->year = '2018';
        $expense2->month = 'August';
        $expense2->amount = '10000';
        $expense2->save();

        $expense3->year = '2018';
        $expense3->month = 'September';
        $expense3->amount = '5000';
        $expense3->save();

        $expense4->year = '2018';
        $expense4->month = 'October';
        $expense4->amount = '15000';
        $expense4->save();

        $expense5->year = '2018';
        $expense5->month = 'November';
        $expense5->amount = '15000';
        $expense5->save();

        $expense6->year = '2018';
        $expense6->month = 'December';
        $expense6->amount = '15000';
        $expense6->save();
    }
}
