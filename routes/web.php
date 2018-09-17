<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');


/*
|--------------------------------------------------------------------------
| Static Pages Routes
|--------------------------------------------------------------------------
*/

Route::get('/index', 'StaticPageController@show_index');
Route::get('/index/about', 'StaticPageController@show_about');
Route::get('/index/gallery', 'StaticPageController@show_gallery');
Route::resource('/index/class_packages', 'PackageController');
//Route::get('/index/class_packages', 'StaticPageController@show_packages');
Route::resource('/index/schedule', 'ScheduleController');
//Route::get('/index/schedule', 'StaticPageController@show_schedule');
Route::get('/index/testimonials', 'StaticPageController@show_testimonials');
Route::get('/index/contact', 'StaticPageController@show_contact');


/*
|--------------------------------------------------------------------------
| Administrator Panel Routes
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', 'AdminController@show_dashboard');

Route::resource('/receptionist','ReceptionistController');

Route::post('/index/contact','MessagesController@submit');

Route::get('/customers','CustomerController@show_customers');

Route::resource('/customers', 'CustomerController');

Route::get('/dashboard/class_packages', 'PackageController@admin');


