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

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('dashboard')->group(function () {

    Route::get('adminLogin', 'Auth\AdminLoginController@login')->name('admin.auth.login');

    Route::post('/loginAdmin', 'Auth\AdminLoginController@loginAdmin')->name('admin.auth.loginAdmin');
});

Route::group(['middleware' => 'admin'], function () {

    Route::prefix('dashboard')->group(function () {


        Route::post('logout', 'Auth\AdminLoginController@logout')->name('admin.auth.logout');

        Route::get('/admin', 'admin\AdminController@index')->name('admin.admin.dashboard');

        Route::get('/charity', 'admin\CharityController@index')->name('admin.charity.dashboard');

        Route::post('/case/{case}/update', 'admin\CharityController@update')->name('updateCase.charity');

        Route::post('/case/{case}/delete', 'admin\CharityController@destroy')->name('deleteCase.charity');

        Route::get('/case/{case}/', 'admin\CharityController@updateview')->name('updateCaseView.charity');

        Route::post('/case', 'admin\CharityController@store')->name('addCase.charity');

        Route::get('/charity/{charity}/all', 'admin\CharityController@showAll')->name('admin.charity.all.dashboard');

    });
});
