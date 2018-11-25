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



Route::prefix('customer')->group(function(){
  Route::get('/register','AuthCustomer\RegisterCustomerController@showFormRegister')->name('customer.register.form');
  Route::post('/register','AuthCustomer\RegisterCustomerController@register')->name('customer.register');
  Route::get('/login','AuthCustomer\LoginCustomerController@showFormCustomerLogin')->name('customer.login.form');
  Route::post('/login','AuthCustomer\LoginCustomerController@loginCustomer')->name('customer.login');
  Route::post('/logout','AuthCustomer\LoginCustomerController@logoutCustomer')->name('customer.logout');
});

Route::resources([
            'customer'  => 'CustomerController',
            'staff'     => 'UserController',
            'tour'      => 'TourController',
            'hotel'     => 'HotelController'
          ]);

Route::get('city/{nation}','CityController@index');
