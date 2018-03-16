<?php

    Route::get('/','DefaultController@index')->middleware('tran');

    Route::group(['middleware'=>['checklog','tran','auth','web']],function (){

        Route::get('/home','DefaultController@index');
        Route::get('/admin/locale/{locale}','DefaultController@locale');
        Route::get('/admin','DefaultController@AdminPanel');
        Route::get('/role/view','RoleController@index');
        Route::post('/admin/create/role','RoleController@createRole');
        Route::get('/admin/delete/role/{id}','RoleController@deleteRole');
        Route::get('/admin/update/role/edit/{id}','RoleController@edit');
        Route::get('/admin/role/update/{id}','RoleController@updateRole');
        Route::patch('/admin/role/update/{id}','RoleController@updateRole');

        //Position Route
        Route::get('/admin/position/create','PositionController@createPosition');
        Route::post('/admin/position/store','PositionController@store');
        Route::get('/admin/position/delete/{id}','PositionController@deletePosition');
        Route::get('/admin/position/edit/{id}','PositionController@edit');
        Route::patch('/admin/position/update/{id}','PositionController@updatePosition');

        //user
        Route::get('/admin/user','UserController@create');
        Route::post('/admin/user/stored','UserController@stored');
        Route::get('/admin/user/edit/{id}','UserController@edit');
        Route::patch('/admin/user/update/{id}','UserController@update');
        Route::get('/admin/user/view/{id}','UserController@viewUser');
        Route::get('/admin/user/delete/{id}','UserController@delete');
        Route::get('/admin/get/user','UserController@getUserList');
        Route::get('/admin/reset/password/{id}','UserController@resetPassword');
        Route::patch('/admin/reset/user/password/{id}','UserController@resetPasswordSuccess');

<<<<<<< HEAD
        //categories (create category and article)
        Route::resource('/category','CategoryController');
        Route::get('/category/delete/{id}','CategoryController@deleteCate');
        Route::get('/category/edit/{id}','CategoryController@edit');
=======
        //Permission
        Route::get('/admin/permission','PermissionContoller@create');
        Route::get('/admin/permission/list','PermissionContoller@index');

        Route::get('/admin/permission/on/{id}','PermissionContoller@edit');
        Route::get('/admin/permission/off/{id}','PermissionContoller@show');
        //staff
        Route::resource('staff','StaffController');
        Route::get('/staff/edit/{id}','StaffController@edit');
        Route::get('/staff/delete/{id}','StaffController@destroy');
        Route::get('/staff/view/{id}','StaffController@show');
        //Branch
        Route::resource('/branch','branchController');
        Route::get('/branch/turn/off/{id}','branchController@turnOff'); //turn off branch
        Route::get('/branch/turn/on/{id}','branchController@turnOn'); //turn on branch
        Route::get('/branch/edit/branch/{id}','branchController@editBranch'); //edit branch

        //client
        Route::resource('/client','clientController');
        Route::get('/client/turn/on/{id}','clientController@turnOn');
        Route::get('/client/turn/off/{id}','clientController@turnOff');
        Route::get('/client/edit/{id}','clientController@edit');

        //treatment
        Route::resource('/treatment','treatmentController');
        Route::post('/treatment/create/','treatmentController@createTreatMentType');
        Route::get('/treatment/get/view','treatmentController@viewTreatMentType');

        Route::get('/treatment/turn/off/{id}','treatmentController@turnOff');
        Route::get('/treatment/turn/on/{id}','treatmentController@turnOn');
        Route::get('/treatment/turn/edit/{id}','treatmentController@editTreatmentType');
        Route::get('/treatment/get/formCreate/','treatmentController@getFormCreat');
        Route::post('/treatment/update/treatment/type','treatmentController@updateTreatmentType')->name('updateTreatmentType');
        //treatment
        Route::get('/treatment/view/current/create','treatmentController@viewTreatmentJustCreate');
        Route::get('/treatment/view/treatment','treatmentController@viewTreatment')->name('view-treatment');
        Route::get('/treatment/view/treatment/content','treatmentController@viewTreatmentContent')->name('view-treatment-content');
        Route::get('/treatment/deactive/{id}','treatmentController@deactiveTreatment');
        Route::get('/treatment/active/{id}','treatmentController@activeTreatment');

        //doctor
        Route::resource('doctor','DoctorController');
        Route::get('/doctor/edit/{id}','DoctorController@edit');
        Route::get('/doctor/delete/{id}','DoctorController@destroy');
        Route::get('/doctor/view/{id}','DoctorController@show');
        //section
        Route::get('/section/create/{name}','DoctorController@createSection');
        Route::get('/get/select/section','DoctorController@selectSection');

        //doctor
        //servay
        Route::resource('servay','ServayController');
        Route::get('/servay/edit/{id}','ServayController@edit');
        Route::get('/servay/delete/{id}','ServayController@destroy');

        //plan
        Route::resource('/plan','planController');
        Route::get('/plan/viewCurrent/{id}','planController@viewCurrent');
        Route::get('/plan/detail/view/{id}','planController@viewDetail');
        Route::get('/plan/detail/content/{id}','planController@getContentViewDetail');
        Route::get('/plan/detail/update/complete/{id}','planController@completed');
        //doctor appointment
        Route::get('/plan/doctor/appointment/{id}','planController@doctorAppointment');
        Route::get('/plan/get/price/treatment/{id}','planController@getPriceTreatment');


        //treatment procedure
        Route::resource('/treatmentprocedure','treatmentProcedure');
        //getTreatment
        Route::get('/gettreatment/change/{id}','treatmentProcedure@getTreatment');
        //get doctor
        Route::get('/getdoctor/by/branch/{id}','treatmentProcedure@getDoctor');
        Route::get('/get/doctor/appointment/{id}','treatmentProcedure@getDoctorApp');

        //Invoice
        Route::resource('/invoice','invoiceController');
        Route::get('/invoice/show/plan/detail/{id}','invoiceController@showDetailPlan');
        Route::get('/invoice/print/invoice/{id}','invoiceController@printInvoice');

        //prescription
        Route::resource('/prescription','prescriptionController');
        Route::get('/prescription/get/plan/{id}','prescriptionController@getPlan');
        Route::get('/prescription/get/treatment/{id}','prescriptionController@getTreatment');
        Route::get('/prescription/get/price/{id}','prescriptionController@getPrice');
        Route::get('/prescription/get/current/create/{id}','prescriptionController@getCurrent');
        Route::get('/prescription/delete/prescription/{id}','prescriptionController@deletePre');
        Route::get('/prescription/print/prescription/{id}','prescriptionController@printPre');
        Route::get('/prescription/client/history/{id}','prescriptionController@medicalHistory');



        //category
        Route::resource('category','CategoryController');
        Route::get('/category/edit/{id}','CategoryController@edit');
        Route::get('/category/delete/{id}','CategoryController@destroy');
        Route::get('/get/select/parent','CategoryController@getSelectParent');

        //product
        Route::resource('product','ProductController');
        Route::get('/product/edit/{id}','ProductController@edit');
        Route::get('/product/delete/{id}','ProductController@destroy');

        //pricelist
        Route::resource('pricelist','PricelistController');
        Route::get('/pricelist/edit/{id}','PricelistController@edit');
        Route::get('/pricelist/delete/{id}','PricelistController@destroy');

        //suppliers
        Route::resource('suppliers','SupplyController');
        Route::get('/suppliers/edit/{id}','SupplyController@edit');
        Route::get('/suppliers/delete/{id}','SupplyController@destroy');

        //import
        Route::resource('import','ImportController');
        Route::get('/import/edit/{id}','ImportController@edit');
        Route::get('/import/delete/{id}','ImportController@destroy');
        Route::get('/import/add/{proId}/{qty}/{mfd}/{exp}','ImportController@importAdd');
        Route::get('/import/view/record','ImportController@viewRecord');
        Route::get('/tmp/import/remove/{id}','ImportController@remove');
        Route::get('/tmp/import/discard','ImportController@discard');




    });



>>>>>>> aad6970dd43ac7795bd50acede401a769aa325b8


        //Article
        Route::resource('/article','ArticleController');

        //Language
        Route::resource('/language','LanguageController');
        Route::get('/language/edit/{id}','LanguageController@edit');
        Route::patch('/language/update/{id}','LanguageController@update');
        Route::get('/language/delete/{id}','LanguageController@destroy');


        //category product
        Route::resource('/categoryproduct','categoryProductController');

        //category product
        Route::resource('/categoryproduct','categoryProductController');
        Route::get('/category/product/change/parent/{id}','categoryProductController@changeParent');
        Route::get('/category/product/edit/{id}/{language_id}','categoryProductController@edit');
        Route::get('/category/product/delete/{id}','categoryProductController@show');

        //product
        Route::resource('/product','productController');

        //category
        Route::resource('/category','CategoryController');
        Route::get('/category/edit/{id}/{langId}','CategoryController@edit');
        Route::patch('/category/update/{id}','CategoryController@update');
        Route::get('/category/delete/{id}','CategoryController@destroy');
        Route::get('/get/select/parent','CategoryController@getSelectParent');
        Route::get('/get/select/language/{id}','CategoryController@getSelectLanguage');
        Route::get('/get/select/parent/{id}','CategoryController@selectParent');

        //client
        Route::resource('/client','ClientController');













    });
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
