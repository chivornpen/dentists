<?php

    Route::get('/','DefaultController@index');

    Route::group(['middleware'=>'checklog','auth','web'],function (){

//        Route::get('/home','DefaultController@index');
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




    });

























Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
