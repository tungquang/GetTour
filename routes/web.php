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

Route::get('/', function (){
    return view('home');
});
// Route::get('test', function () {
//     return view('hotel.detail');
// });
Auth::routes();
// page list
Route::prefix('/page/tour')->group(function(){
  Route::get('/','HomeController@index');
});

//
Route::prefix('/cart')->group(function(){
  Route::get('','CartController@index')->name('cart.index');
  Route::get('add','CartController@add')->name('cart.add');
  Route::get('update','CartController@update')->name('cart.update');
  Route::get('edit','CartController@edit')->name('cart.edit');
  Route::get('destroy','CartController@destroy')->name('cart.destroy');
  Route::get('remove','CartController@remove')->name('cart.remove');
  Route::get('submit','CartController@submit')->name('cart.submit');
});


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
            'hotel'     => 'HotelController',
            'car'     => 'CarController',
          ]);

Route::get('city/{nation}','CityController@index');
