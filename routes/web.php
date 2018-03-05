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

Route::get('/', 'HomeController@index')->name('home');

// supplier crud

Route::get('/supplier/index','SupplierController@index');
Route::get('/supplier/create','SupplierController@create');
Route::POST('/supplier/store','SupplierController@store');
Route::POST('/supplier/update','SupplierController@update');
Route::POST('supplier/destroy','SupplierController@destroy');

// Raw Material

Route::get('/rawmaterial/index','RawMaterialController@index');
Route::get('/rawmaterial/create','RawMaterialController@create');
Route::POST('/rawmaterial/store','RawMaterialController@store');
Route::POST('/rawmaterial/update','RawMaterialController@update');
Route::POST('/rawmaterial/destroy','RawMaterialController@destroy');
Route::get('/rawmaterial/show/{id}','RawMaterialController@show');

// Raw Product
Route::get('/rawproduct/index','RawProductController@index');
Route::get('/rawproduct/create','RawProductController@create');
Route::POST('/rawproduct/store','RawProductController@store');
Route::POST('/rawproduct/update','RawProductController@update');
Route::POST('/rawproduct/destroy','RawProductController@destroy');

//ProcessMaterial
Route::get('/processmaterial/index','ProcessMaterialController@index');
Route::get('/processmaterail/create','ProcessMaterialController@create');
Route::POST('/processmaterial/store','ProcessMaterialController@store');
Route::POST('/processmaterial/update','ProcessMaterialController@update');
Route::POST('/processmaterial/destroy','ProcessMaterialController@destroy');

//ProcessProduct
Route::get('/processproduct/index','ProcessProductController@index');
Route::get('/processproduct/create','ProcessProductController@create');
Route::POST('/processproduct/store','ProcessProductController@store');
Route::POST('/processproduct/update','ProcessProductController@update');
Route::POST('/processproduct/destroy','ProcessProductController@destroy');


//rawmaterial seperation
Route::get('/rawmaterialseperation/index','RawmaterialSeperationController@index');
Route::get('/rawmaterialseperation/create','RawmaterialSeperationController@create');
Route::POST('/rawmaterialseperation/store','RawmaterialSeperationController@store');
Route::POST('/rawmaterialseperation/update','RawmaterialSeperationController@update');
Route::POST('/rawmaterialseperation/destroy','RawmaterialSeperationController@destroy');

// ProcessShaping
Route::get('/shapedproduct/index','ShapedProductController@index');
Route::get('/shapedproduct/create','ShapedProductController@create');
Route::POST('/shapedproduct/store','ShapedProductController@store');
Route::POST('/shapedproduct/update','ShapedProductController@update');
Route::POST('/shapedproduct/destroy','ShapedProductController@destroy');

// work Records
Route::get('/workedrecord/index','WorkedRecordsController@index');
Route::get('/workedrecord/create','WorkedRecordsController@create');
Route::POST('/workedrecord/store','WorkedRecordsController@store');
Route::POST('/workedrecord/update','WorkedRecordsController@update');
Route::POST('/workedrecord/destroy','WorkedRecordsController@destroy');

Route::get('/staff/index',['as'=>'staffindex','uses'=>'StaffController@index']);
Route::get('staff/create',['as'=>'staffcreate','uses'=>'StaffController@create']);
Route::post('staff/store/',['as'=>'staffstore','uses'=>'StaffController@store']);
Route::post('staff/update',['as'=>'staffupdate','uses'=>'StaffController@update']);
Route::get('staff/destroy/{id}',['as'=>'staffdestroy','uses'=>'StaffController@destroy']);

Route::get('/grade/index',['as'=>'gradeindex','uses'=>'GradeController@index']);
Route::get('grade/create',['as'=>'gradecreate','uses'=>'GradeController@create']);
Route::post('grade/store/',['as'=>'gradestore','uses'=>'GradeController@store']);
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

// Process Cleaning
Route::get('processcleaning/index',['as'=>'processcleaningindex','uses'=>'ProcessCleaningController@index']);
Route::get('processcleaning/create',['as'=>'processcleaningcreate','uses'=>'ProcessCleaningController@create']);
Route::post('processcleaning/store/',['as'=>'processcleaningstore','uses'=>'ProcessCleaningController@store']);
Route::post('processcleaning/update',['as'=>'processcleaningupdate','uses'=>'ProcessCleaningController@update']);
Route::get('processcleaning/destroy/{id}',['as'=>'processcleaningdestroy','uses'=>'ProcessCleaningController@destroy']);

// Worked Records
Route::get('workedrecords/index',['as'=>'workedrecordsindex','uses'=>'WorkedRecordsController@index']);
Route::get('workedrecords/create',['as'=>'workedrecordscreate','uses'=>'WorkedRecordsController@create']);
Route::post('workedrecords/store/',['as'=>'workedrecordsstore','uses'=>'WorkedRecordsController@store']);
Route::post('workedrecords/update',['as'=>'workedrecordsupdate','uses'=>'WorkedRecordsController@update']);
Route::get('workedrecords/destroy/{id}',['as'=>'workedrecordsdestroy','uses'=>'WorkedRecordsController@destroy']);

Route::get('/driedproduct/index',['as'=>'driedproductindex','uses'=>'DriedProductController@index']);
Route::get('driedproduct/create',['as'=>'driedproductcreate','uses'=>'DriedProductController@create']);
Route::post('driedproduct/store/',['as'=>'driedproductstore','uses'=>'DriedProductController@store']);
Route::post('driedproduct/update',['as'=>'driedproductupdate','uses'=>'DriedProductController@update']);
Route::post('driedproduct/destroy',['as'=>'driedproductdestroy','uses'=>'DriedProductController@destroy']);

Route::get('rawmaterialpurchasing/index',['as'=>'rawmaterialpurchasingindex','uses'=>'RawMaterialPurchasingController@index']);
Route::get('rawmaterialpurchasing/create',['as'=>'rawmaterialpurchasingcreate','uses'=>'RawMaterialPurchasingController@create']);
Route::post('rawmaterialpurchasing/store/',['as'=>'rawmaterialpurchasingstore','uses'=>'RawMaterialPurchasingController@store']);
Route::post('rawmaterialpurchasing/update',['as'=>'rawmaterialpurchasingupdate','uses'=>'RawMaterialPurchasingController@update']);
Route::post('rawmaterialpurchasing/destroy',['as'=>'rawmaterialpurchasingdestroy','uses'=>'RawMaterialPurchasingController@destroy']);

Route::get('processmaterialreceiving/index',['as'=>'processmaterialreceivingindex','uses'=>'ProcessMaterialReceivingController@index']);
Route::get('processmaterialreceiving/create',['as'=>'processmaterialreceivingcreate','uses'=>'ProcessMaterialReceivingController@create']);
Route::post('processmaterialreceiving/store/',['as'=>'processmaterialreceivingstore','uses'=>'ProcessMaterialReceivingController@store']);
Route::post('processmaterialreceiving/update',['as'=>'processmaterialreceivingupdate','uses'=>'ProcessMaterialReceivingController@update']);
Route::post('processmaterialreceiving/destroy',['as'=>'processmaterialreceivingdestroy','uses'=>'ProcessMaterialReceivingController@destroy']);

// Process Driying

Route::get('/processdriying/index','ProcessDriyingController@index');
Route::get('/processdriying/create','ProcessDriyingController@create');
Route::POST('/processdriying/store','ProcessDriyingController@store');
Route::POST('/processdriying/update','ProcessDriyingController@update');
Route::POST('/processdriying/destroy','ProcessDriyingController@destroy');