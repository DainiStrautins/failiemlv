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
Route::get('/permission-denied', 'AdminController@permisionDenied')->name('_nopermission');
// Secondary authentication, roles (Admin and User)
Route::group(['middleware'=> ['auth','verified']], function(){
    Route::post('/', 'UploadController@store');
    // After uploading files you get redirected here (/user)
    Route::get('/user', 'UserController@index');
    // Outputs all current user records (if no records, gets msg)
    Route::post('/user', 'UserController@store');

    // USER DELETE
    Route::get('user/delete/{id}', 'UserController@deleteuser');
    Route::post('user/delete/{id}', 'UserController@commituser')->name('commituser');

    //User Download
    Route::get('user/download/{id}','UserController@download');

    // Users authentication
    Route::get('/subscription', 'SubscriptionController@create');
    Route::post('/subscription', 'SubscriptionController@store');
    Route::get('/notifications', 'UserNotificationsController@show');

    //Admin authentication
    Route::group(['middleware'=> ['admin','verified']], function(){

        Route::get('/admin', 'AdminController@index')->name('admin');
        Route::get('/admin/remove-admin/{userId}', 'AdminController@destroy');
        Route::get('/admin/give-admin/{userId}', 'AdminController@update');

        //output all records (admin panel, with out admin auth unable to see this page!)
        Route::get('/allrecords', 'UploadController@GetAllRecords');
        Route::post('/allrecords', 'UploadController@storeadmin');

        Route::get('admin/delete/{id}', 'AdminController@show');
        Route::post('admin/delete/{id}', 'AdminController@delete')->name('AdminDelete');

        // ADMIN delete
        Route::get('allrecords/delete/{id}', 'UploadController@delete');
        Route::post('allrecords/delete/{id}', 'UploadController@commit')->name('commit');
    });
});


Route::get('/', function () {
    return view('welcome');
});


