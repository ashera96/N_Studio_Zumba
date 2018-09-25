<?php

use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pack1 = new App\Package;
        $pack2 = new App\Package;
        $pack3 = new App\Package;
        $pack4 = new App\Package;

        $pack1->name= '5 Days Per Week';
        $pack1->price = 3000;
        $pack1->services = 'Zumba & Workout Session';
        $pack1->classes_to_cover = 20;
        $pack1->save();

        $pack2->name= '3 Days Per Week';
        $pack2->price = 2000;
        $pack2->services = 'Zumba & Workout Session';
        $pack2->classes_to_cover = 12;
        $pack2->save();

        $pack3->name= '7 Days Per Week';
        $pack3->price = 5000;
        $pack3->services = 'Zumba & Workout Session';
        $pack3->classes_to_cover = 28;
        $pack3->save();

        $pack4->name= 'Weekend';
        $pack4->price = 2000;
        $pack4->services = 'Workout session every Saturday and Sunday';
        $pack4->classes_to_cover = 8;
        $pack4->save();

    }
}
