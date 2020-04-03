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

// Route::get('admin-dashboard', function () {
//     return view('admin/admin_template');
// });
// Route::get('admin-dashboard/index', function () {
//     return view('admin/index');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin','namespace'=>'Admin'], function () {
    
    // -- Admin --
    Route::get('/admin-create', 'AdminController@admin_create')->name('admin-create');
    Route::post('/admin-save', 'AdminController@admin_save')->name('admin-save');
    Route::get('/admin-list', 'AdminController@admin_list')->name('admin-list');
    Route::get('/admin-edit/{id}', 'AdminController@admin_edit')->name('admin-edit');
    Route::post('/admin-update/{id}', 'AdminController@admin_update')->name('admin-update');
    Route::get('/admin-delete/{id}', 'AdminController@admin_delete')->name('admin-delete');

    // -- Notice --
    Route::get('/notice-create','NoticeController@notice_create')->name('notice-create');
    Route::post('/notice-save','NoticeController@notice_save')->name('notice-save');
    Route::get('/notice-list','NoticeController@notice_list')->name('notice-list');
    Route::get('/notice-edit/{id}','NoticeController@notice_edit')->name('notice-edit');
    Route::post('/notice-update/{id}','NoticeController@notice_update')->name('notice-update');
    Route::get('/notice-delete/{id}','NoticeController@notice_delete')->name('notice-delete');
    Route::get('/notice-unpublished/{id}','NoticeController@notice_unpublished')->name('notice-unpublished');
    Route::get('/notice-published/{id}','NoticeController@notice_published')->name('notice-published');
});

