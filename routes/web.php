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

Route::get('/staff/index',['as'=>'staffindex','uses'=>'StaffController@index']);
Route::get('staff/create',['as'=>'staffcreate','uses'=>'StaffController@create']);
Route::post('staff/store/',['as'=>'staffstore','uses'=>'StaffController@store']);
Route::post('staff/update',['as'=>'staffupdate','uses'=>'StaffController@update']);
Route::get('staff/destroy/{id}',['as'=>'staffdestroy','uses'=>'StaffController@destroy']);

Route::get('/grade/index',['as'=>'gradeindex','uses'=>'GradeController@index']);
Route::get('grade/create',['as'=>'gradecreate','uses'=>'GradeController@create']);
Route::post('grade/store/',['as'=>'gradestroe','uses'=>'GradeController@store']);
Route::post('grade/update',['as'=>'gradeupdate','uses'=>'GradeController@update']);
Route::get('grade/destroy/{id}',['as'=>'gradedestroy','uses'=>'GradeController@destroy']);
