<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'PagesController@homepage');
    Route::get('about', 'PagesController@about');
    
    Route::resource('mailbox', 'MailboxController');

    $this->get('login', 'Auth\AuthController@showLoginForm');
    $this->post('login', 'Auth\AuthController@login');
    $this->get('logout', 'Auth\AuthController@logout');

    Route::get('pbk/homepage_pbk', 'PbkController@homepage_pbk');
    Route::get('register/homepage_register', 'RegisterController@homepage_register');
    Route::get('printDaftar', 'RegisterController@printDaftar');
    Route::resource('register', 'RegisterController');
    
    Route::get('wp/cari', 'WpController@cari');
    Route::get('importExport', 'WpController@importExport');
    Route::get('downloadExcel/{type}', 'WpController@downloadExcel');
    Route::post('importExcel', 'WpController@importExcel');
    Route::get('pdf', 'WpController@pdf');
    
    Route::get('printBuktiPbk/{pbk}', 'PbkController@printBuktiPbk');
    Route::resource('pbk', 'PbkController');
    Route::resource('wp', 'WpController');
    
    Route::resource('user', 'UserController');

});