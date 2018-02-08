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

// supplier crud

Route::get('/supplier/index','SupplierController@index');
Route::get('/supplier/create','SupplierController@create');
Route::POST('/supplier/store','SupplierController@store');
Route::POST('/supplier/update','SupplierController@update');
Route::POST('supplier/destroy','SupplierController@destroy');

// raw material

Route::get('/rawmaterial/index','RawMaterialController@index');
Route::get('/rawmaterial/create','RawMaterialController@create');
Route::POST('/rawmaterial/store','RawMaterialController@store');
Route::get('/rawmaterial/edit/{id}','RawMaterialController@edit');
Route::POST('/rawmaterial/update/{id}','RawMaterialController@update');
Route::POST('rawmaterial/destroy','RawMaterialController@destroy');


