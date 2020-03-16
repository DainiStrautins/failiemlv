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
Route::get('/home', 'HomeController@index')->name('home');

// Secondary authentication, roles (Admin and User)
Route::group(['middleware'=> ['auth']], function(){

    // Users authentication
    Route::get('/permission-denied', 'DemoController@permisionDenied')->name('nopermission');
    Route::get('/subscription', 'SubscriptionController@create')->middleware('verified');
    Route::post('/subscription', 'SubscriptionController@store')->middleware('verified');
    Route::get('/notifications', 'UserNotficationsController@show')->middleware('verified');
    //Admin authentication
    Route::group(['middleware'=> ['admin']], function(){


        Route::get('/admin', 'AdminController@index')->name('admin')->middleware('verified');
        Route::get('/admin/remove-admin/{userId}', 'AdminController@removeAdmin')->middleware('verified');
        Route::get('/admin/give-admin/{userId}', 'AdminController@giveAdmin')->middleware('verified');

        //output all records (admin panel, with out admin auth unable to see this page!)
        Route::get('/allrecords', 'UploadController@GetAllRecords')->middleware('verified');
        Route::post('/allrecords', 'UploadController@storeadmin')->middleware('verified');

        Route::get('admin/delete/{id}', 'UploadController@indexAdminDelete')->middleware('verified');
        Route::post('admin/delete/{id}', 'UploadController@AdminDelete')->name('AdminDelete')->middleware('verified');

        // ADMIN delete
        Route::get('allrecords/delete/{id}', 'UploadController@delete')->middleware('verified');
        Route::post('allrecords/delete/{id}', 'UploadController@commit')->name('commit')->middleware('verified');
    });
});


// Start of the landing page
// Show Landing page
Route::get('/', function () {
    return view('welcome');
});

// Inserts Data into database and redirects further into the website (/user)
Route::post('/', 'UploadController@store')->middleware('auth');
// End of the landing page


// After uploading files you get redirected here (/user)
Route::get('/user', 'UploadController@get')->middleware('auth')->middleware('verified');
// Outputs all current user records (if no records, gets msg)
Route::post('/user', 'UploadController@store')->middleware('auth')->middleware('verified');

// USER DELETE
Route::get('user/delete/{id}', 'UploadController@deleteuser')->middleware('verified');
Route::post('user/delete/{id}', 'UploadController@commituser')->name('commituser')->middleware('verified');

