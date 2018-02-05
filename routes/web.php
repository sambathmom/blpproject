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

Route::get('/staff',['as'=>'staff','uses'=>'StaffController@index']);
Route::get('staff/new',['as'=>'staffnew','uses'=>'StaffController@new']);
Route::POST('test/insert/',['as'=>'staffinsert','uses'=>'StaffController@insert']);
Route::get('staff/edit/{id}',['as'=>'staffedit','uses'=>'StaffController@edit']);
Route::POST('test/updated/',['as'=>'staffupdate','uses'=>'StaffController@updated']);