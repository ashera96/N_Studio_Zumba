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

Route::get('/', 'StaticPageController@show_index');
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
    Route::post('/add_package', 'UserPackageController@create')->middleware('customer');
    Route::get('/add_package/{id}', 'UserPackageController@on_load')->middleware('customer');
    Route::get('/delete_package/{id}', 'UserPackageController@delete')->middleware('customer');
    Route::get('/schedule', 'UserScheduleController@index')->middleware('customer');
    Route::post('/submit_schedules','UserScheduleController@store')->middleware('customer');
    Route::get('/change_schedule', 'UserScheduleController@edit')->middleware('customer');
    Route::put('/update_schedule','UserScheduleController@update')->middleware('customer');
    //Users table column for registration_fee_payment_status -> either 1 or 0 -> boolean value, depending on weather the fee has been settled or not
    Route::get('/testimonials', 'CustomerPageController@show_testimonials')->middleware('customer');
    Route::get('/contact', 'CustomerPageController@show_contact')->middleware('customer');
//    Route::get('/profile', 'CustomerPageController@show_profile')->middleware('customer');
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
    Route::resource('/receptionist','ReceptionistController')->middleware('admin');
   // Route::resource('/uploada','UploadController')->middleware('admin');
    Route::get('/customers','UserController@show_user_index')->middleware('admin');
    Route::resource('/customers', 'UserController')->middleware('admin');
    Route::get('dashboard/class_packages', 'PackageController@admin')->middleware('admin');
    Route::get('dashboard/schedule', 'ScheduleController@admin')->middleware('admin');
    Route::get('/dashboard', 'AdminController@show_dashboard')->name('admin.dashboard')->middleware('admin');
    Route::get('dashboard/receptionist','ReceptionistController@create')->name('admin_panel.add')->middleware('admin');
    Route::post('dashboard/receptionist','ReceptionistController@store')->middleware('admin');
    //routes for notification scenario
    Route::get('/create_notifications','NotificationController@index')->name('admin_panel.create_notifications')->middleware('admin');
    Route::get('/show_posts','PostController@index')->name('admin_panel.show_posts')->middleware('admin');
    Route::post('/create_health_tips','NotificationController@store_health_tips')->middleware('admin');
    Route::post('/create_general_notifications','NotificationController@store_general_news')->middleware('admin');
    Route::post('/create_post','PostController@store')->middleware('admin');
    Route::get('/create_notifications/{id}/update','PostController@update')->middleware('admin');
    Route::put('/create_notifications/{id}/update','PostController@edit')->name('post.edit')->middleware('admin');
    Route::resource('/show_posts','PostController')->middleware('admin');
    Route::get('/send_health_advices','MedicalAdviceController@index')->middleware('admin');
    Route::post('/create_medical_advice','MedicalAdviceController@store')->middleware('admin');
    //end of routes for notifications
    Route::get('dashboard/admin_gallery', 'AdminController@show_gallery');
    Route::get('/schedules','AdminController@show_schedules')->middleware('admin');
    Route::get('/reports','WeightController@show_weight_index')->middleware('admin');
    Route::resource('/reports','WeightController')->middleware('admin');
    Route::get('dashboard/reports','WeightController@create')->name('admin_panel.add_weight')->middleware('admin');
    Route::post('dashboard/reports','WeightController@store')->middleware('admin');
    //Route::get('/weight_view','WeightController@view')->middleware('admin');

    Route::get('/reports_attendance','AttendanceController@show_attendance_index')->middleware('admin');
    Route::resource('/reports_attendance','AttendanceController')->middleware('admin');

    Route::get('/markasactive/{id}','UserController@UpdateCustomerActive');
    Route::get('/markasnotactive/{id}','UserController@UpdateCustomerNotActive');
    Route::delete('reports/{id}/{month}/{year}', 'WeightController@destroy')->name('reports.destroy');
    Route::delete('reports_attendance/{id}/{month}/{year}', 'AttendanceController@destroy')->name('reports_attendance.destroy');
    Route::get('/increTot/{id}/{month}/{year}','AttendanceController@UpdateTotal');
    Route::get('/increAtt/{id}/{month}/{year}','AttendanceController@UpdateAttend');
    Route::get('/reports/{id}/{month}/{year}/edit','WeightController@edit')->name('reports.edit');
    Route::post('/reports/{id}/{month}/{year}','WeightController@update')->name('reports.update');


    Route::get('/markasactive/{id}','ReceptionistController@UpdateRecepActive');
    Route::get('/markasnotactive/{id}','ReceptionistController@UpdateRecepNotActive');


    Route::get('/payments','PaymentController@load_receptionists')->middleware('admin');
});
//Route::get('/dashboard', 'AdminController@show_dashboard')->name('admin.dashboard');
//Route::get('/customers','CustomerController@show_customers');


/*
|--------------------------------------------------------------------------
| Receptionist Routes
|--------------------------------------------------------------------------
*/

Route::prefix('recep')->group(function() {
    Route::get('/dashboard','RecepMainController@show_recep_dash')->middleware('receptionist');
    Route::resource('/profile','ReceptionistController')->middleware('receptionist');
   // Route::resource('/customers', 'UserController')->middleware('receptionist');
    Route::get('/fees','UserController@index2')->middleware('receptionist');
    Route::get('/payments','RecepMainController@show_payments')->middleware('receptionist');
    Route::get('/schedules','RecepMainController@show_schedules')->middleware('receptionist');
    Route::get('/monthly_payment/{id}','RecepMainController@update_payment_status')->middleware('receptionist');


//    Route::resource('/recep_dash','ReceptionistController')->middleware('recep');
//
//    Route::get('/customers','UserController@show_user_index')->middleware('admin');
//    Route::resource('/customers', 'UserController')->middleware('admin');
//    Route::get('dashboard/class_packages', 'PackageController@admin')->middleware('admin');
//    Route::get('dashboard/schedule', 'ScheduleController@admin')->middleware('admin');
//    Route::get('/dashboard', 'AdminController@show_dashboard')->name('admin.dashboard')->middleware('admin');

});



Route::prefix('receptionist')->group(function() {
    Route::get('/', 'EmployeeController@index')->name('receptionist.dashboard')->middleware('receptionist');
});

Route::post('uploadss','UploadController@upload');


