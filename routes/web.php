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
| Customer Routes
|--------------------------------------------------------------------------
*/

Route::prefix('home')->group(function() {
    Route::get('/about', 'CustomerPageController@show_about')->middleware('customer');
    Route::get('/gallery', 'CustomerPageController@show_gallery')->middleware('customer');
    Route::get('/class_packages', 'PackageController@customer')->middleware('customer');

    //Users table column for registration_fee_payment_status -> either 1 or 0 -> boolean value, depending on weather the fee has been settled or not
    Route::get('/testimonials', 'CustomerPageController@show_testimonials')->middleware('customer');
    Route::get('/contact', 'CustomerPageController@show_contact')->middleware('customer');
    Route::get('/payment', 'CustomerPageController@show_payment')->middleware('customer');
    Route::get('/reports', 'CustomerPageController@show_reports')->middleware('customer');
    Route::get('markAsRead',function(){
       auth()->user()->unreadNotifications->markAsRead();
       return redirect()->back();
    })->name('markAsRead');
});

/*
|--------------------------------------------------------------------------
| Administrator Panel Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function() {
    //Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    //Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::resource('/receptionist','ReceptionistController')->middleware('admin');
    Route::get('/customers','UserController@show_user_index')->middleware('admin');
    Route::resource('/customers', 'UserController')->middleware('admin');
    Route::get('dashboard/class_packages', 'PackageController@admin')->middleware('admin');
    Route::get('dashboard/schedule', 'ScheduleController@admin')->middleware('admin');
    Route::get('/dashboard', 'AdminController@show_dashboard')->name('admin.dashboard')->middleware('admin');
    Route::get('dashboard/receptionist','ReceptionistController@create')->name('admin_panel.add')->middleware('admin');
    Route::post('dashboard/receptionist','ReceptionistController@store')->middleware('admin');
    Route::get('/create_notifications','NotificationController@index')->name('admin_panel.create_notifications')->middleware('admin');
    Route::post('/create_health_tips','NotificationController@store_health_tips')->middleware('admin');
    Route::post('/create_general_notifications','NotificationController@store_general_news')->middleware('admin');
    Route::get('dashboard/admin_gallery', 'AdminController@show_gallery');
    Route::get('/reports','UserWeightController@show_weight_index')->middleware('admin');
    Route::resource('/reports','UserWeightController')->middleware('admin');
    Route::get('/weight_view','WeightController@show_weight_view')->middleware('admin');
    Route::resource('/weight_view','WeightController')->middleware('admin');
    Route::get('/reports_attendance','ReportsAttendanceController@show_reports_attendance')->middleware('admin');
    Route::resource('/reports_attendance','ReportsAttendanceController')->middleware('admin');
});
//Route::get('/dashboard', 'AdminController@show_dashboard')->name('admin.dashboard');
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

Route::post('uploadss','UploadController@upload');
