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

// Main authentication for ALL this project
// Login and Register system
// Database storing registered users

Auth::routes(['verify' => true]);
Route::get('/permission-denied', 'AdminController@permisionDenied')->name('nopermission')->middleware('auth');
// Secondary authentication, roles (Admin and User)
Route::group(['middleware'=> ['auth','verified']], function(){
    Route::post('/', 'UploadController@store');
    Route::get('/main', 'MainController@index');
    Route::post('/main', 'MainController@store');

    // After uploading files you get redirected here (/user)
    Route::get('/user', 'UserController@get');
    // Outputs all current user records (if no records, gets msg)
    Route::post('/user', 'UserController@store');

    // USER DELETE
    Route::get('user/delete/{id}', 'UserController@deleteuser');
    Route::post('user/delete/{id}', 'UserController@commituser')->name('commituser');
    // Users authentication
    Route::get('/subscription', 'SubscriptionController@create');
    Route::post('/subscription', 'SubscriptionController@store');
    Route::get('/notifications', 'UserNotificationsController@show');

    //Admin authentication
    Route::group(['middleware'=> ['admin','verified']], function(){

        Route::get('/admin', 'AdminController@index')->name('admin')->middleware('verified');
        Route::get('/admin/remove-admin/{userId}', 'AdminController@destroy')->middleware('verified');
        Route::get('/admin/give-admin/{userId}', 'AdminController@update')->middleware('verified');

        //output all records (admin panel, with out admin auth unable to see this page!)
        Route::get('/allrecords', 'UploadController@GetAllRecords')->middleware('verified');
        Route::post('/allrecords', 'UploadController@storeadmin')->middleware('verified');

        Route::get('admin/delete/{id}', 'AdminController@show')->middleware('verified');
        Route::post('admin/delete/{id}', 'AdminController@delete')->name('AdminDelete')->middleware('verified');

        // ADMIN delete
        Route::get('allrecords/delete/{id}', 'UploadController@delete')->middleware('verified');
        Route::post('allrecords/delete/{id}', 'UploadController@commit')->name('commit')->middleware('verified');
    });
});


Route::get('/', function () {
    return view('welcome');
});


