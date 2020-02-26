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


Auth::routes();


//General middleware auth
Route::group(['middleware'=> ['auth']], function(){


    //Users auth
    Route::get('/user', 'DemoController@usersDemo')->name('user');
    Route::get('/permission-denied', 'DemoController@permisionDenied')->name('nopermission');

    //Admin middleware
    Route::group(['middleware'=> ['admin']], function(){

        Route::get('/admin', 'AdminController@index')->name('admin');
        Route::get('/admin/remove-admin/{userId}', 'AdminController@removeAdmin');
        Route::get('/admin/give-admin/{userId}', 'AdminController@giveAdmin');
        //output all records (admin panel, with out admin auth unable to see this page!)
        Route::get('/allrecords', 'UploadController@GetAllRecords');
        Route::post('/allrecords', 'UploadController@storeadmin');

        // ADMIN delete
        Route::get('allrecords/delete/{id}', 'UploadController@delete');
        Route::post('allrecords/delete/{id}', 'UploadController@commit')->name('commit');
    });
});


Route::get('/', function () {
    return view('welcome');
});


//output all records (users panel, can access his records if he has any!)
Route::get('/user', 'UploadController@get')->middleware('auth');




Route::get('/home', 'HomeController@index')->name('home');


Route::post('/', 'UploadController@store')->middleware('auth');

Route::post('/user', 'UploadController@store')->middleware('auth');



// USER DELETE
Route::get('user/delete/{id}', 'UploadController@deleteuser');
Route::post('user/delete/{id}', 'UploadController@commituser')->name('commituser');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
