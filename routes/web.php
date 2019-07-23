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


Route::get('adminLogin', 'Auth\AdminLoginController@login')->name('admin.auth.login');
Route::post('/loginAdmin', 'Auth\AdminLoginController@loginAdmin')->name('admin.auth.loginAdmin');
Route::post('logout', 'Auth\AdminLoginController@logout')->name('admin.auth.logout');

Route::get('/admin', 'admin\AdminController@index')->name('admin.admin.dashboard');
Route::get('/charity', 'admin\CharityController@index')->name('admin.charity.dashboard');

