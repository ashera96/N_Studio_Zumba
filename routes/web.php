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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

//provides security for after login re-directions by auth middleware
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

Route::post('/index/contact','MessagesController@submit');

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

Route::get('/home/about', 'CustomerPageController@show_about')->middleware('customer');
Route::get('/home/gallery', 'CustomerPageController@show_gallery')->middleware('customer');
Route::get('/home/class_packages', 'PackageController@customer')->middleware('customer');

//Users table column for registration_fee_payment_status -> either 1 or 0 -> boolean value, depending on weather the fee has been settled or not
Route::get('/home/testimonials', 'CustomerPageController@show_testimonials')->middleware('customer');
Route::get('/home/contact', 'CustomerPageController@show_contact')->middleware('customer');
Route::get('/home/payment', 'CustomerPageController@show_payment')->middleware('customer');
Route::get('/home/reports', 'CustomerPageController@show_reports')->middleware('customer');

/*
|--------------------------------------------------------------------------
| Administrator Panel Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function() {
    //Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    //Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::resource('/receptionist','ReceptionistController')->middleware('admin');
    Route::get('/customers','CustomerController@show_customers')->middleware('admin');
    Route::resource('/customers', 'CustomerController')->middleware('admin');
    Route::get('/dashboard/class_packages', 'PackageController@admin')->middleware('admin');
    Route::get('dashboard/schedule', 'ScheduleController@admin')->middleware('admin');
    Route::get('/dashboard', 'AdminController@show_dashboard')->name('admin.dashboard')->middleware('admin');
    Route::get('dashboard/receptionist','ReceptionistController@create')->name('admin_panel.add')->middleware('admin');
    Route::post('dashboard/receptionist','ReceptionistController@store')->middleware('admin');
    Route::get('/create_notifications','NotificationController@index')->name('admin_panel.create_notifications')->middleware('admin');
    Route::post('/create_notifications','NotificationController@store_health_tips')->middleware('admin');
});
Route::get('/dashboard', 'AdminController@show_dashboard')->name('admin.dashboard');
//Route::get('/customers','CustomerController@show_customers');


/*
|--------------------------------------------------------------------------
| Receptionist Routes
|--------------------------------------------------------------------------
*/

Route::prefix('receptionist')->group(function() {
    //Route::get('/login', 'Auth\ReceptionistLoginController@showLoginForm')->name('receptionist.login');
    //Route::post('/login', 'Auth\ReceptionistLoginController@login')->name('receptionist.login.submit');
    Route::get('/', 'EmployeeController@index')->name('receptionist.dashboard')->middleware('receptionist');
});
