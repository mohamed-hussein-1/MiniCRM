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
Route::get('/invite-employee','EmployeeController@showInvitationPage');
Route::post('/invite-employee','EmployeeController@inviteEmployee')->name('invite');
Route::get('/add-customers','EmployeeController@showCustomerAddition');
Route::post('/add-customers','EmployeeController@addCustomer')->name('assign-customer');
Route::get('/show-customers','EmployeeController@showCustomers');
Route::get('/show-customers/{id}','EmployeeController@showCustomer');
Route::post('/add-action','EmployeeController@addaction')->name('add-action');
