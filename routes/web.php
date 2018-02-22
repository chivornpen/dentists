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

<<<<<<< HEAD
        //Permission
        Route::get('/admin/permission','PermissionContoller@create');
        Route::get('/admin/permission/list','PermissionContoller@index');

        Route::get('/admin/permission/on/{id}','PermissionContoller@edit');
        Route::get('/admin/permission/off/{id}','PermissionContoller@show');
=======
        //staff
        Route::resource('staff','StaffController');
        Route::get('/staff/edit/{id}','StaffController@edit');
        Route::get('/staff/delete/{id}','StaffController@destroy');
        Route::get('/staff/view/{id}','StaffController@show');
        //Branch
        Route::resource('/branch','branchController');

>>>>>>> 7005f1e8f37c9841dbb77964755ec2850051722c

    });

























Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
