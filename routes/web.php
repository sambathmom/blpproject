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

Route::group(['middleware' => ['auth']], function() {

    Route::get('/', 'HomeController@index')->name('home');

    // Supplier
    Route::get('/supplier/index', ['as'=>'supplier.index', 'uses'=>'SupplierController@index', 'middleware' => ['permission:supplier-view|supplier-create|supplier-edit|supplier-delete']]);
    Route::get('/supplier/create', ['as'=>'supplier.creare', 'uses'=>'SupplierController@create', 'middleware' => ['permission:supplier-create']]);
    Route::POST('/supplier/store', ['as'=>'supplier.store', 'uses'=>'SupplierController@store', 'middleware' => ['permission:supplier-create']]);
    Route::POST('/supplier/update', ['as'=>'supplier.update', 'uses'=>'SupplierController@update', 'middleware' => ['permission:supplier-edit']]);
    Route::POST('supplier/destroy', ['as'=>'supplier.destroy', 'uses'=>'SupplierController@destroy', 'middleware' => ['permission:supplier-delete']]);

    // Staff
    Route::get('/staff/index', ['as'=>'staffindex','uses'=>'StaffController@index', 'middleware' => ['permission:staff-view|staff-create|staff-edit|staff-delete']]);
    Route::get('staff/create', ['as'=>'staffcreate','uses'=>'StaffController@create', 'middleware' => ['permission:staff-create']]);
    Route::post('staff/store/', ['as'=>'staffstore','uses'=>'StaffController@store', 'middleware' => ['permission:staff-create']]);
    Route::post('staff/update', ['as'=>'staffupdate','uses'=>'StaffController@update', 'middleware' => ['permission:staff-edit']]);
    Route::post('staff/destroy', ['as'=>'staffdestroy','uses'=>'StaffController@destroy', 'middleware' => ['permission:staff-delete']]);

    // Grade
    Route::get('/grade/index', ['as'=>'gradeindex','uses'=>'GradeController@index', 'middleware' => ['permission:grade-view|grade-create|grade-edit|grade-delete']]);
    Route::get('grade/create', ['as'=>'gradecreate','uses'=>'GradeController@create', 'middleware' => ['permission:grade-create']]);
    Route::post('grade/store/', ['as'=>'gradestore','uses'=>'GradeController@store', 'middleware' => ['permission:grade-create']]);
    Route::post('grade/update', ['as'=>'gradeupdate','uses'=>'GradeController@update', 'middleware' => ['permission:grade-edit']]);
    Route::post('grade/destroy', ['as'=>'gradedestroy','uses'=>'GradeController@destroy', 'middleware' => ['permission:grade-delete']]);

    // Work type
    Route::get('/worktype/index', ['as'=>'worktypeindex','uses'=>'WorkTypeController@index', 'middleware' => ['permission:wt-view|wt-create|wt-edit|wt-delete']]);
    Route::get('worktype/create', ['as'=>'worktypecreate','uses'=>'WorkTypeController@create', 'middleware' => ['permission:wt-create']]);
    Route::post('worktype/store/', ['as'=>'worktypestroe','uses'=>'WorkTypeController@store', 'middleware' => ['permission:wt-create']]);
    Route::post('worktype/update', ['as'=>'worktypeupdate','uses'=>'WorkTypeController@update', 'middleware' => ['permission:wt-edit']]);
    Route::post('worktype/destroy', ['as'=>'worktypedestroy','uses'=>'WorkTypeController@destroy', 'middleware' => ['permission:wt-delete']]);

    // Labor cost
    Route::get('laborcost/index', ['as'=>'laborcostindex','uses'=>'LaborCostController@index', 'middleware' => ['permission:lc-view|lc-create|lc-edit|lc-delete']]);
    Route::get('laborcost/create', ['as'=>'laborcostcreate','uses'=>'LaborCostController@create', 'middleware' => ['permission:lc-create']]);
    Route::post('laborcost/store/', ['as'=>'laborcoststore','uses'=>'LaborCostController@store', 'middleware' => ['permission:lc-create']]);
    Route::post('laborcost/update', ['as'=>'laborcostupdate','uses'=>'LaborCostController@update', 'middleware' => ['permission:lc-edit']]);
    Route::post('laborcost/destroy', ['as'=>'laborcostdestroy','uses'=>'LaborCostController@destroy', 'middleware' => ['permission:lc-delete']]);

    // Raw material purchasing
    Route::get('rawmaterialpurchasing/index', ['as'=>'rawmaterialpurchasingindex','uses'=>'RawMaterialPurchasingController@index', 'middleware' => ['permission:rmp-view|rmp-create|rmp-edit|rmp-delete']]);
    Route::get('rawmaterialpurchasing/create', ['as'=>'rawmaterialpurchasingcreate','uses'=>'RawMaterialPurchasingController@create', 'middleware' => ['permission:rmp-create']]);
    Route::post('rawmaterialpurchasing/store/', ['as'=>'rawmaterialpurchasingstore','uses'=>'RawMaterialPurchasingController@store', 'middleware' => ['permission:rmp-create']]);
    Route::post('rawmaterialpurchasing/update', ['as'=>'rawmaterialpurchasingupdate','uses'=>'RawMaterialPurchasingController@update', 'middleware' => ['permission:rmp-edit']]);
    Route::post('rawmaterialpurchasing/destroy', ['as'=>'rawmaterialpurchasingdestroy','uses'=>'RawMaterialPurchasingController@destroy', 'middleware' => ['permission:rmp-delete']]);

    // Rawmaterial seperation
    Route::get('/rawmaterialseperation/index', ['as'=>'rawmaterialseperation.index', 'uses'=>'RawmaterialSeperationController@index', 'middleware' => ['permission:rms-view|rms-create|rms-edit|rms-delete']]);
    Route::get('/rawmaterialseperation/create', ['as'=>'rawmaterialseperation.create', 'uses'=>'RawmaterialSeperationController@create', 'middleware' => ['permission:rms-create']]);
    Route::POST('/rawmaterialseperation/store', ['as'=>'rawmaterialseperation.store', 'uses'=>'RawmaterialSeperationController@store', 'middleware' => ['permission:rms-create']]);
    Route::POST('/rawmaterialseperation/update', ['as'=>'rawmaterialseperation.update', 'uses'=>'RawmaterialSeperationController@update', 'middleware' => ['permission:rms-edit']]);
    Route::POST('/rawmaterialseperation/destroy', ['as'=>'rawmaterialseperation.destroy', 'uses'=>'RawmaterialSeperationController@destroy', 'middleware' => ['permission:rms-delete']]);

    // Process material receving
    Route::get('processmaterialreceiving/index', ['as'=>'processmaterialreceivingindex','uses'=>'ProcessMaterialReceivingController@index', 'middleware' => ['permission:pmr-view|pmr-create|pmr-edit|pmr-delete']]);
    Route::get('processmaterialreceiving/create', ['as'=>'processmaterialreceivingcreate','uses'=>'ProcessMaterialReceivingController@create','middleware' => ['permission:pmr-create'] ]);
    Route::post('processmaterialreceiving/store/', ['as'=>'processmaterialreceivingstore','uses'=>'ProcessMaterialReceivingController@store', 'middleware' => ['permission:pmr-create']]);
    Route::post('processmaterialreceiving/update', ['as'=>'processmaterialreceivingupdate','uses'=>'ProcessMaterialReceivingController@update', 'middleware' => ['permission:pmr-edit']]);
    Route::post('processmaterialreceiving/destroy', ['as'=>'processmaterialreceivingdestroy','uses'=>'ProcessMaterialReceivingController@destroy', 'middleware' => ['permission:pmr-delete']]);

    // Process shaping
    Route::get('processshaping/index', ['as'=>'processshaping.index', 'uses'=>'ProcessShapingController@index', 'middleware' => ['permission:ps-view|ps-create|ps-edit|ps-delete']]);
    Route::get('processshaping/create', ['as'=>'processshaping.create', 'uses'=>'ProcessShapingController@create', 'middleware' => ['permission:ps-create']]);
    Route::POST('processshaping/store', ['as'=>'processshaping.store', 'uses'=>'ProcessShapingController@store', 'middleware' => ['permission:ps-create']]);
    Route::POST('processshaping/update', ['as'=>'processshaping.update', 'uses'=>'ProcessShapingController@update', 'middleware' => ['permission:ps-edit']]);
    Route::POST('processshaping/destroy', ['as'=>'processshaping.destroy', 'uses'=>'ProcessShapingController@destroy', 'middleware' => ['permission:ps-delete']]);

    // Process cleaning
    Route::get('processcleaning/index', ['as'=>'processcleaningindex','uses'=>'ProcessCleaningController@index', 'middleware' => ['permission:pc-view|pc-create|pc-edit|pc-delete']]);
    Route::get('processcleaning/create', ['as'=>'processcleaningcreate','uses'=>'ProcessCleaningController@create', 'middleware' => ['permission:pc-create']]);
    Route::post('processcleaning/store/', ['as'=>'processcleaningstore','uses'=>'ProcessCleaningController@store', 'middleware' => ['permission:pc-create']]);
    Route::post('processcleaning/update', ['as'=>'processcleaningupdate','uses'=>'ProcessCleaningController@update', 'middleware' => ['permission:pc-edit']]);
    Route::get('processcleaning/destroy', ['as'=>'processcleaningdestroy','uses'=>'ProcessCleaningController@destroy', 'middleware' => ['permission:pc-delete']]);

    // Process drying
    Route::get('/processdrying/index', ['as'=>'processdrying.index', 'uses'=>'ProcessDryingController@index', 'middleware' => ['permission:pd-view|pd-create|pd-edit|pd-delete']]);
    Route::get('/processdrying/create', ['as'=>'processdrying.create', 'uses'=>'ProcessDryingController@create', 'middleware' => ['permission:pd-create']]);
    Route::POST('/processdrying/store', ['as'=>'processdrying.store', 'uses'=>'ProcessDryingController@store', 'middleware' => ['permission:pd-create']]);
    Route::POST('/processdrying/update', ['as'=>'processdrying.update', 'uses'=>'ProcessDryingController@update', 'middleware' => ['permission:pd-edit']]);
    Route::POST('/processdrying/destroy', ['as'=>'processdrying.destroy', 'uses'=>'ProcessDryingController@destroy', 'middleware' => ['permission:pd-delete']]);

    // Report
    Route::get('reports/viewworkedrecords', ['as'=>'reportsviewworkedrecords', 'uses'=>'ReportsController@viewWorkedRecords', 'middleware' => ['permission:vwr']]);
    Route::get('reports/viewworkedrecordsdetail/{id}', ['as'=>'reportsviewworkedrecordsdetail', 'uses'=>'ReportsController@viewworkedRecordsDetail', 'middleware' => ['permission:vwr']]);
    Route::get('reports/viewdetailworkedrecords/{start}/{end}', ['as'=>'reportsviewdetailworked.records', 'uses'=>'ReportsController@viewdetailworkedrecords', 'middleware' => ['permission:vwr']]);
    Route::get('reports/viewlosingrawmaterials', ['as'=>'reportsviewlosingrawmaterials', 'uses'=>'ReportsController@viewLosingRowMaterials', 'middleware' => ['permission:vlr']]);
    Route::get('reports/viewlosingitemdetial/{id}', ['as'=>'reportsviewlosingitemdetial', 'uses'=>'ReportsController@viewLosingItemDetail', 'middleware' => ['permission:vlr']]);
    Route::get('reports/viewrawproductlosing/{start}/{end}', ['as'=>'reportsviewrawproductlosing', 'uses'=>'ReportsController@viewRawProductLosing', 'middleware' => ['permission:vlr']]);

    // User 
    Route::get('users',['as'=>'users.index','uses'=>'UserController@index','middleware' => ['permission:user-view|user-create|user-edit|user-delete']]);
    Route::get('users/create',['as'=>'users.create','uses'=>'UserController@create','middleware' => ['permission:user-create']]);
    Route::post('users/create',['as'=>'users.store','uses'=>'UserController@store','middleware' => ['permission:user-create']]);
    Route::get('users/{id}',['as'=>'users.show','uses'=>'UserController@show']);
    Route::get('users/{id}/edit',['as'=>'users.edit','uses'=>'UserController@edit','middleware' => ['permission:user-edit']]);
    Route::patch('users/{id}',['as'=>'users.update','uses'=>'UserController@update','middleware' => ['permission:user-edit']]);
    Route::delete('users/{id}',['as'=>'users.destroy','uses'=>'UserController@destroy','middleware' => ['permission:user-delete']]);

    // Role
    Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
    Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
    Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);
    Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
    Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
    Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);
    Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);
});
