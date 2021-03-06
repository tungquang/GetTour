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

Route::get('/', 'HomeController@index');

///Home page
Route::get('/home','HomeController@index')->name('home.page');
Route::get('/page/hotel','HomeController@hotel')->name('hotel.page');
Route::get('/page/car','HomeController@car')->name('car.page');
Route::get('/page/tour','HomeController@tour')->name('tour.page');

Route::get('/page/contact','HomeController@contact')->name('contact.page');

Route::post('/page/{type}/{id_post}','HomeController@comment')->name('comment.post');
Route::post('/page/{type}/{id_post}/more','HomeController@getMoreComment')->name('get.more.comment');

Auth::routes();



Route::prefix('/cart')->group(function(){
  Route::get('','CartController@index')->name('cart.index');
  Route::get('add','CartController@add')->name('cart.add');
  Route::get('update','CartController@update')->name('cart.update');
  Route::get('edit','CartController@edit')->name('cart.edit');
  Route::get('destroy','CartController@destroy')->name('cart.destroy');
  Route::get('remove','CartController@remove')->name('cart.remove');
  Route::get('submit','CartController@submit')->name('cart.submit');
});

//searrch
Route::post('search/tour','SearchController@searchTour')->name('search.tour');
Route::post('search/hotel','SearchController@searchHotel')->name('search.hotel');
Route::post('search/car','SearchController@searchCar')->name('search.car');


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
            'car'       => 'CarController',
            'role'      => 'RoleController',
            'topic'     => 'TopicController'
          ]);

Route::get('city/{nation}','CityController@index');

//Permission
Route::prefix('permission')->group(function(){
  Route::post('/store','PermissionController@store')->name('permission.store');
  Route::patch('/update/{id}','PermissionController@update')->name('permission.update');
  Route::delete('/update/{$id}','PermissionController@destroy')->name('permission.destroy');
});
//Role
Route::put('role/attach/{id}','RoleController@attachToPermission')->name('role.attach');
Route::put('user/attach/{role}','UserController@attachToRole')->name('user.attach.role');
//Bill
Route::prefix('bill')->group(function(){
  Route::get('new','BillController@newBill')->name('bill.new');
  Route::get('checked','BillController@chekedBill')->name('bill.checked');
  Route::get('detail/{id_bill}','BillController@detail')->name('bill.detail');
  Route::get('customer/','BillController@billOfCustomer')->name('bill.customer');
  Route::get('detailbillOfCustomer/{id_bill}','BillController@detailbillOfCustomer')->name('bill.detail.customer');
  Route::get('check/{id_bill}','BillController@check')->name('bill.check');

});
//Trash
Route::get('trash/customer','CustomerController@indexBan')->name('customer.trash');
Route::get('trash/staff','UserController@indexBan')->name('staff.trash');
Route::get('trash/tour','TourController@indexBan')->name('tour.trash');
Route::get('trash/hotel','HotelController@indexBan')->name('hotel.trash');
Route::get('trash/car','CarController@indexBan')->name('car.trash');
Route::get('trash/topic','TopicController@indexBan')->name('topic.trash');
