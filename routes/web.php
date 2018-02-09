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

Route::get('/worktype/index',['as'=>'worktypeindex','uses'=>'WorkTypeController@index']);
Route::get('worktype/create',['as'=>'worktypecreate','uses'=>'WorkTypeController@create']);
Route::post('worktype/store/',['as'=>'worktypestroe','uses'=>'WorkTypeController@store']);
Route::post('worktype/update',['as'=>'worktypeupdate','uses'=>'WorkTypeController@update']);
Route::get('worktype/destroy/{id}',['as'=>'worktypedestroy','uses'=>'WorkTypeController@destroy']);

Route::get('laborcost/index',['as'=>'laborcostindex','uses'=>'LaborCostController@index']);
Route::get('laborcost/create',['as'=>'laborcostcreate','uses'=>'LaborCostController@create']);
Route::post('laborcost/store/',['as'=>'laborcoststore','uses'=>'LaborCostController@store']);
Route::post('laborcost/update',['as'=>'laborcostupdate','uses'=>'LaborCostController@update']);
Route::get('laborcost/destroy/{id}',['as'=>'laborcostdestroy','uses'=>'LaborCostController@destroy']);
