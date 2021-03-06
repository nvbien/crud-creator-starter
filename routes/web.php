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

Route::middleware( [ 'author' , 'auth' ] )->group( function () {
  Route::get('/set-timezone-local', ['as' => 'set-timezone-local', 'uses' => 'HomeController@setTimezoneLocal']);
  Route::get('/', 'HomeController@index')->name('home');

  Route::resource('users', 'UserController');

  Route::resource('roles', 'RoleController');

  Route::resource('activityLogs', 'ActivityLogController');
  Route::post('hotels/{id}/setAdmin', 'HotelController@setAdmin')->name('hotel.setAdmin');
  Route::resource('hotels', 'HotelController');
});


Route::resource('employees', 'EmployeeController');

Route::resource('buses', 'BusController');

Route::resource('busDrivers', 'BusDriverController');

Route::resource('busOperators', 'BusOperatorController');