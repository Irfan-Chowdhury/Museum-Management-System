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

});

