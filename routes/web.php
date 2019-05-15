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
    return redirect('phonebook');
});

Route::get('/phonebook/{route}', function ($route = null) {
    return view('phonebook');
})->where(['route' => '.*']);

Route::resource('phonebook','PhoneController');
Route::post('getData','PhoneController@getData');

Route::get('search/{key}','PhoneController@search');
