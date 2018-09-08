<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        /* Validator::extend('nic',function($attribute,$value,$parameters,$validator){
             $regex1 = '/^[0-9]{2}[5-8]{1}[0-9]{6}[vVxX]$/';
             $regex2 = '/^[0-9]{4}[5-8]{1}[0-9]{7}$/';

             if(strlen('nic')==10){
                 if(!preg_match($regex1, $value)){
                     return true;
                 }
             }elseif(strlen('nic')==12){
                 if(!preg_match($regex1, $value)){
                     return true;
                 }
             }
             else{
                 return false;
             }
         }); */

    }
    public function message(){

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

