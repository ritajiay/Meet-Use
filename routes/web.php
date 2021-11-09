<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// 測試用
// Route::get('/master', function() {
//     return view('.site.layouts.master');
// });

//  帳號密碼 NO ROLE ---------------------------------------------------------------------------------
Route::get('/logout', 'UserLoginController@logout')->name('logout');    //登出
//  登入
Route::prefix('/login')->name('login')->group( function () {
    Route::get('/', 'UserLoginController@login')->middleware('throttle:3,1')->middleware('guest');   //登入限制次數 //已登入跳轉
    Route::post('/auth', 'UserLoginController@authenticate')->name('.auth');     //登入驗證
});

//  All AUTH USER -----------------------------------------------------------------------------------
Route::group(['middleware' => 'auth'], function () {
    //  總覽
    Route::get('/homepage', 'HomePageController@index')->name('manager.homepage');

    //  工作日誌總覽
    Route::prefix('/record')->name('record')->group( function() {
        Route::get('/list', 'RecordListController@index')->name('.list'); // WEB
        Route::get('/edit/{id}', 'RecordListController@edit')->name('.edit');   // EDIT
        Route::get('/destroy/{id}', 'RecordListController@destroy')->name('.destroy');  // DEL
        Route::post('/update/{id}', 'RecordListController@update')->name('.update');   // UPDATE
    });

    //  新增工作日誌
    Route::prefix('/record')->name('record')->group( function() {
        Route::get('/', 'RecordCreateController@index'); // WEB
        Route::post('/store', 'RecordCreateController@store')->name('.store'); // CREATE
    });

    // getSelect
    Route::prefix('/getSelects')->group( function() {
        Route::get('/{id}','RecordCreateController@getSelects'); // 關係選項create
        Route::get('/edit/{id}','RecordListController@edit_getSelects'); // 關係選項edit
    });
    
    // getSelect2
    Route::prefix('/getSelects2')->group( function() {
        Route::get('/{id}','RecordCreateController@getSelects2'); // 關係選項create2
        Route::get('/edit/{id}','RecordListController@edit_getSelects2'); // 關係選項edit2
    });
});

//  Admin,Manager --------------------------------------------------------------------------------------
Route::middleware(['checkRole:admin,manager'])->group(function(){

    //  團隊人員日誌總覽
    Route::prefix('/teamrecord')->name('teamrecord')->group( function() {
        Route::get('/list', 'ProjectListManagerController@index')->name('.list');   // WEB
        Route::get('/{id}/edit', 'ProjectListManagerController@edit')->name('.edit');  // EDIT
        Route::post('/{id}/store', 'ProjectListManagerController@store')->name('.store'); //UPDATE
    });  

    //  專案管理清單_管理者
    Route::prefix('/projectname')->name('projectname')->group( function() {
        Route::get('/', 'ManagerStartProjectController@index');  // WEB
        Route::get('/{id}/destroy', 'ManagerStartProjectController@destroy')->name('.destroy');   // DEL 專案執行項目
        Route::get('/{id}/destroy2', 'ManagerStartProjectController@destroy2')->name('.destroy2');    // DEL2 類別名稱
        Route::get('/{id}/destroy3', 'ManagerStartProjectController@destroy3')->name('.destroy3');    // DEL3 專案編號
        Route::get('/{id}/destroy4', 'ManagerStartProjectController@destroy4')->name('.destroy4');    // DEL4 客戶名稱
    });

    //  Store
    Route::prefix('/store')->name('store')->group( function() {
        Route::post('/client', 'ManagerStartProjectController@store_client')->name('.client'); // 客戶名稱 create
        Route::post('/serial', 'ManagerStartProjectController@store_serial')->name('.serial'); // 專案編號 & 專案名稱 create
        Route::post('/category', 'ManagerStartProjectController@store_category')->name('.category'); // 工作類別 create
        Route::post('/object', 'ManagerStartProjectController@store_object')->name('.object'); // 工作項目 create
    });
    
    //  Update
    Route::prefix('/update')->name('update')->group( function() {
        Route::post('/client', 'ManagerStartProjectController@client_update')->name('.client'); // 客戶名稱 update
        Route::post('/serial', 'ManagerStartProjectController@serial_update')->name('.serial'); // 專案編號 update
        Route::post('/category', 'ManagerStartProjectController@category_update')->name('.category'); // 工作項目 update
        Route::post('/object', 'ManagerStartProjectController@object_update')->name('.object');
    });

    //  專案狀態名稱清單
    Route::prefix('/status/list')->name('status')->group( function() {
        Route::get('/', 'StatuslistController@index')->name('.list'); //WEB
        Route::post('/store', 'StatuslistController@store')->name('.list.store'); //專案狀態名稱 create
        Route::post('/edit', 'StatuslistController@edit')->name('.edit'); //專案狀態名稱 Update
        Route::get('/{id}/destroy', 'StatuslistController@destroy')->name('.destroy'); //專案狀態名稱 DEL
    });

    // 工作日誌審查
    Route::prefix('/status')->name('status')->group( function() {
        Route::get('/', 'StatusController@index'); //WEB
        Route::get('/{id}/view', 'StatusController@view')->name('.view'); //get View
        Route::post('/store', 'StatusController@store')->name('.store'); //專案狀態 create
    });

    Route::prefix('/status/project')->name('statusproject')->group( function() {
        Route::get('/', 'ProjectStatusController@index');
    });

    // 人員出席紀錄
    Route::prefix('/attend/record')->name('attendrecord')->group( function() {
        Route::get('/', 'AttendRecordController@index');
    });
});

//  Admin ----------------------------------------------------------------------------------------------
Route::middleware(['checkRole:admin'])->group(function(){
    // User Create
    Route::prefix('create')->name('usercreate')->group( function() {
        Route::get('/', 'UserCreateController@index');
        Route::post('/store', 'UserCreateController@store')->name('.store');
    });
    // User List
    Route::prefix('/list')->name('user')->group( function() {
        Route::get('/', 'UserListController@index')->name('.list');  //  WEB
        Route::get('/{id}/edit', 'UserListController@edit')->name('.edit'); //  EDIT
        Route::get('/destroy/{id}', 'UserListController@destroy')->name('.destroy'); // DEL
        Route::post('/{id}/update', 'UserListController@update')->name('.update');    // UPDATE
    });
});
