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
use App\Weight;
use App\Attendance;

Auth::routes();

//provides security for after login re-directions by auth middleware
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth','prevent_back_history');




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
    Route::get('/about', 'CustomerPageController@show_about')->middleware('customer','prevent_back_history');
    Route::get('/gallery', 'CustomerPageController@show_gallery')->middleware('customer','prevent_back_history');
    Route::get('/class_packages', 'PackageController@customer')->middleware('customer','prevent_back_history');
    Route::post('/add_package', 'UserPackageController@create')->middleware('customer','prevent_back_history');
    Route::get('/add_package/{id}', 'UserPackageController@on_load')->middleware('customer','prevent_back_history');
    Route::get('/delete_package/{id}', 'UserPackageController@delete')->middleware('customer','prevent_back_history');
    Route::get('/schedule', 'UserScheduleController@index')->middleware('customer','prevent_back_history');
    Route::post('/submit_schedules','UserScheduleController@store')->middleware('customer','prevent_back_history');
    Route::get('/change_schedule', 'UserScheduleController@edit')->middleware('customer','prevent_back_history');
    Route::put('/update_schedule','UserScheduleController@update')->middleware('customer','prevent_back_history');
    //Users table column for registration_fee_payment_status -> either 1 or 0 -> boolean value, depending on weather the fee has been settled or not
    Route::get('/testimonials', 'CustomerPageController@show_testimonials')->middleware('customer','prevent_back_history');
    Route::get('/contact', 'CustomerPageController@show_contact')->middleware('customer','prevent_back_history');
    Route::get('/payment', 'PaymentController@show_payment')->middleware('customer','prevent_back_history');
    Route::post('/charge', 'CheckoutController@charge')->middleware('customer','prevent_back_history');
//    Route::get('/profile', 'CustomerPageController@show_profile')->middleware('customer');
    Route::get('/reports', 'CustomerPageController@show_reports')->middleware('customer','prevent_back_history');
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
    Route::get('/updatePer/{id}/{month}/{year}','AttendanceController@UpdatePercent');
    Route::get('/reports/{id}/{month}/{year}/edit','WeightController@edit')->name('reports.edit');
    Route::post('/reports/{id}/{month}/{year}','WeightController@update')->name('reports.update');
    Route::get('/reports/{id}/{month}/{year}/see','WeightController@see')->name('reports.see');
    Route::get('/reports/{id}/{month}/{year}/edit','WeightController@edit')->name('reports.edit');
    Route::post('/reports/{id}/{month}/{year}','WeightController@update')->name('reports.update');
    Route::get('/reports_attendance/{id}/{month}/{year}/edit','AttendanceController@edit')->name('reports_attendance.edit');
    Route::post('/reports_attendance/{id}/{month}/{year}','AttendanceController@update')->name('reports_attendance.update');


    Route::get('/markasactive/{id}','ReceptionistController@UpdateRecepActive');
    Route::get('/markasnotactive/{id}','ReceptionistController@UpdateRecepNotActive');


    Route::get('/payments','PaymentController@load_receptionists')->middleware('admin');
    Route::get('/salary_payment/{id}','PaymentController@update_payment_status')->middleware('admin');


    Route::any('/reports/search',function(){
        $search = Input::get ('search');
        $weight = Weight::where('id','LIKE','%'.$search.'%')
            //->orWhere('month','LIKE','%'.$search.'%')
            //->orWhere('year','LIKE','%'.$search.'%')
            ->orderBy('created_at', 'ASC')
            ->get();
        if(count($weight) > 0)
            return view('admin_panel.weight_show')->withDetails($weight)->withQuery ($search);
        else
            Session::flash ( 'message', 'No Users found. Please try your search again !' );
        return redirect('/admin/reports');
    });

    Route::any('/reports_attendance/search',function(){
        $title = Input::get ('title');
        $attendance = Attendance::where('id','LIKE','%'.$title.'%')
            //->orWhere('month','LIKE','%'.$title.'%')
            //->orWhere('year','LIKE','%'.$title.'%')
            ->get();
        if(count($attendance) > 0)
            return view('admin_panel.attendance_show')->withDetails($attendance)->withQuery ($attendance);//magic function is equal to ('weight',$details)
        else
            Session::flash ( 'message1', 'No Users found. Please try your search again !' );
        return redirect('/admin/reports_attendance');
    });
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

    Route::resource('/cusprofile', 'UserController')->middleware('receptionist');

    //Route::resource('/customers', 'UserController')->middleware('receptionist');

    Route::get('/fees','UserController@index2')->middleware('receptionist');
    Route::get('/payments','RecepMainController@show_payments')->middleware('receptionist');
    Route::get('/schedules','RecepMainController@show_schedules')->middleware('receptionist');

    Route::get('/markpay/{id}','UserController@PayRegFees');
    Route::get('/markrefund/{id}','UserController@RefundRegFees');


    Route::get('/monthly_payment/{id}','RecepMainController@update_payment_status')->middleware('receptionist');

    Route::resource('/recep_reports','WeightController')->middleware('receptionist');
    Route::get('dashboard/recep_reports','WeightController@create')->name('recep_panel.add_weight')->middleware('receptionist');
    Route::post('dashboard/recep_reports','WeightController@store')->middleware('receptionist');
    //Route::get('/weight_view','WeightController@view')->middleware('receptionist');

    Route::resource('/recep_reports_attendance','AttendanceController')->middleware('receptionist');
    Route::delete('recep_reports/{id}/{month}/{year}', 'WeightController@destroy')->name('recep_reports.destroy');
    Route::delete('recep_reports_attendance/{id}/{month}/{year}', 'AttendanceController@destroy')->name('recep_reports_attendance.destroy');
    Route::get('/increTot/{id}/{month}/{year}','AttendanceController@UpdateTotal');
    Route::get('/increAtt/{id}/{month}/{year}','AttendanceController@UpdateAttend');
    Route::get('/updatePer/{id}/{month}/{year}','AttendanceController@UpdatePercent');
    Route::get('/recep_reports/{id}/{month}/{year}/edit','WeightController@edit')->name('recep_reports.edit');
    Route::post('/recep_reports/{id}/{month}/{year}','WeightController@update')->name('recep_reports.update');
    Route::get('/recep_reports_attendance/{id}/{month}/{year}/edit','AttendanceController@edit')->name('recep_reports_attendance.edit');
    Route::post('/recep_reports_attendance/{id}/{month}/{year}','AttendanceController@update')->name('recep_reports_attendance.update');

   // Route::get('/markasactive/{id}','ReceptionistController@UpdateRecepActive');
   // Route::get('/markasnotactive/{id}','ReceptionistController@UpdateRecepNotActive');

    Route::get('/markasactive/{id}','UserController@UpdateCustomerActive');
    Route::get('/markasnotactive/{id}','UserController@UpdateCustomerNotActive');




//    Route::resource('/recep_dash','ReceptionistController')->middleware('recep');
//
//    Route::get('/customers','UserController@show_user_index')->middleware('admin');
//    Route::resource('/customers', 'UserController')->middleware('admin');
//    Route::get('dashboard/class_packages', 'PackageController@admin')->middleware('admin');
//    Route::get('dashboard/schedule', 'ScheduleController@admin')->middleware('admin');
//    Route::get('/dashboard', 'AdminController@show_dashboard')->name('admin.dashboard')->middleware('admin');

    Route::any('/recep_reports/search1',function(){
        $search = Input::get ('search1');
        $weight = Weight::where('id','LIKE','%'.$search.'%')
            ->orWhere('month','LIKE','%'.$search.'%')
            ->orWhere('year','LIKE','%'.$search.'%')
            ->get();
        if(count($weight) > 0)
            return view('recep_panel.weight_show')->withDetails($weight)->withQuery ($search);
        else
            Session::flash ( 'message2', 'No Details found. Please try your search again !' );
        return redirect('/recep/recep_reports');
    });

    Route::any('/recep_reports_attendance/search1',function(){
        $title = Input::get ('title');
        $attendance = Attendance::where('id','LIKE','%'.$title.'%')
            ->orWhere('month','LIKE','%'.$title.'%')
            ->orWhere('year','LIKE','%'.$title.'%')
            ->get();
        if(count($attendance) > 0)
            return view('recep_panel.attendance_show')->withDetails($attendance)->withQuery ($attendance);
        else
            Session::flash ( 'message3', 'No Details found. Please try your search again !' );
        return redirect('/recep/recep_reports_attendance');
    });

});



Route::prefix('receptionist')->group(function() {
    Route::get('/', 'EmployeeController@index')->name('receptionist.dashboard')->middleware('receptionist');
});

Route::post('uploadss','UploadController@upload');


