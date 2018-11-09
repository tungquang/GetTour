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

Route::get('/customer', 'CustomerController@index')->name('customer');

Route::get('customer/register','AuthCustomer\RegisterCustomerController@showFormRegister')->name('customer.register.form');
Route::post('customer/register','AuthCustomer\RegisterCustomerController@register')->name('customer.register');
Route::get('customer/login','AuthCustomer\LoginCustomerController@showFormCustomerLogin')->name('customer.login.form');
Route::post('customer/login','AuthCustomer\LoginCustomerController@loginCustomer')->name('customer.login');
Route::post('customer/logout','AuthCustomer\LoginCustomerController@logoutCustomer')->name('customer.logout');
