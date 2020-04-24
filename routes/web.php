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

// Route::get('/', function () {
//     //return view('welcome');
//     return view('public.pages.home.index');
// });

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

    // -- Rules --
    Route::get('/rule-create','RuleController@rule_create')->name('rule-create');
    Route::post('/rule-save','RuleController@rule_save')->name('rule-save');
    Route::get('/rule-list','RuleController@rule_list')->name('rule-list');
    Route::get('/rule-edit/{id}','RuleController@rule_edit')->name('rule-edit');
    Route::post('/rule-update/{id}','RuleController@rule_update')->name('rule-update');
    Route::get('/rule-delete/{id}','RuleController@rule_delete')->name('rule-delete');
    Route::get('/rule-unpublished/{id}','RuleController@rule_unpublished')->name('rule-unpublished');
    Route::get('/rule-published/{id}','RuleController@rule_published')->name('rule-published');
    
    // -- Museum --
    Route::group(['prefix' => 'museum'], function () {
        
        // -- Museum --
        Route::get('/museum-create','MuseumController@museum_create')->name('museum-create');
        Route::post('/museum-save','MuseumController@museum_save')->name('museum-save');
        Route::get('/museum-manage','MuseumController@museum_manage')->name('museum-manage');
        Route::get('/museum-edit/{id}','MuseumController@museum_edit')->name('museum-edit');
        Route::post('/museum-update/{id}','MuseumController@museum_update')->name('museum-update');

        // -- Photo Gallery --
        Route::get('/photo-gallery-manage','MuseumController@photo_gallery_create')->name('photo-gallery-manage');
        Route::post('/photo-save','MuseumController@photo_save')->name('photo-save');
        Route::post('/photo-update/{id}','MuseumController@photo_update')->name('photo-update');
        Route::get('/photo-delete/{id}','MuseumController@photo_delete')->name('photo-delete');
        Route::get('/photo-unpublished/{id}','MuseumController@photo_unpublished')->name('photo-unpublished');
        Route::get('/photo-published/{id}','MuseumController@photo_published')->name('photo-published');
    });
    

    // -- Schedule --
    Route::get('/schedule-create','ScheduleController@schedule_create')->name('schedule-create');
    Route::post('/schedule-save','ScheduleController@schedule_save')->name('schedule-save');
    Route::get('/schedule-manage','ScheduleController@schedule_manage')->name('schedule-manage');
    Route::get('/schedule-edit/{id}','ScheduleController@schedule_edit')->name('schedule-edit');
    Route::post('/schedule-update/{id}','ScheduleController@schedule_update')->name('schedule-update');
    
    // -- Item --
    Route::get('/item-create','ItemController@item_create')->name('item-create');
    Route::post('/item-save','ItemController@item_save')->name('item-save');
    Route::get('/item-list','ItemController@item_list')->name('item-list');
    Route::get('/item-edit/{id}','ItemController@item_edit')->name('item-edit');
    Route::post('/item-update/{id}','ItemController@item_update')->name('item-update');
    Route::get('/item-delete/{id}','ItemController@item_delete')->name('item-delete');
    
    // -- Category of Item --
    Route::get('/category-manage','CategoryController@category_manage')->name('category-manage');
    Route::post('/category-save','CategoryController@category_save')->name('category-save');
    Route::post('/category-update/{id}','CategoryController@category_update')->name('category-update');
    Route::get('/category-delete/{id}','CategoryController@category_delete')->name('category-delete');

    // -- Visitor --
    Route::get('/visitor-create','VisitorController@visitor_create')->name('visitor-create');
    Route::post('/visitor-save','VisitorController@visitor_save')->name('visitor-save');
    Route::get('/visitor-list','VisitorController@visitor_list')->name('visitor-list');
    Route::post('/visitor-update/{id}','VisitorController@visitor_update')->name('visitor-update');
    Route::get('/visitor-delete/{id}','VisitorController@visitor_delete')->name('visitor-delete');
    
    // -- Visit Entry --
    Route::get('/visit-entry-create','VisitEntryController@visitor_entry_create')->name('visit-entry-create');
    Route::post('/visit-entry-save','VisitEntryController@visit_entry_save')->name('visit-entry-save');
    Route::get('/visit-entry-list','VisitEntryController@visit_entry_list')->name('visit-entry-list');
    Route::get('/visit-entry-delete/{id}','VisitEntryController@visit_entry_delete')->name('visit-entry-delete');

    //Donation
    Route::get('/all-donation','DonationController@all_donation')->name('all-donation');
    Route::get('/donation-reject/{id}','DonationController@donation_reject')->name('donation-reject');
    Route::get('/donation-accept/{id}','DonationController@donation_accept')->name('donation-accept');
    
    //Message
    Route::get('/user-messages','MessageController@user_messages')->name('user-messages');
    Route::get('/visitor-messages','MessageController@visitor_messages')->name('visitor-messages');
    Route::get('/message-read/{id}','MessageController@message_read')->name('message-read');
    Route::get('/message-delete/{id}','MessageController@message_delete')->name('message-delete');
});

//Manage = List


// ==================== Public =================

Route::group(['namespace'=>'Front'], function () {

    // Route::get('/','VisitorController@header');
    Route::get('/','VisitorController@home')->name('home');
    Route::get('/about','VisitorController@about')->name('about');
    // Route::get('/front/about','VisitorController@about')->name('front.about');
    Route::get('/gallery','VisitorController@gallery')->name('gallery');
    Route::get('/contact','VisitorController@contact')->name('contact');
    Route::post('/message-visitor-save','VisitorController@message_visitor_save')->name('message-visitor-save');


    //Others
    Route::group(['prefix' => 'others'], function () {
        Route::get('/notice','VisitorController@notice')->name('notice');
        Route::get('/notice/{id}','VisitorController@notice_read')->name('notice.read');
        Route::get('/rule','VisitorController@rule')->name('rule');
        Route::get('/schedule','VisitorController@schedule')->name('schedule');
        Route::get('/item-info','VisitorController@item_info')->name('item-info');
    });
    
    //Donation
    Route::group(['prefix' => 'donation'], function () {
        Route::get('/donation-create','DonationController@donation_create')->name('donation-create');
        Route::post('/donation-save','DonationController@donation_save')->name('donation-save');
        Route::get('/donation-list','DonationController@donation_list')->name('donation-list');
        Route::get('/donation-edit/{id}','DonationController@donation_edit')->name('donation-edit');
        Route::post('/donation-update/{id}','DonationController@donation_update')->name('donation-update');

        Route::get('/donation-image-delete/{id}','DonationController@donation_image_delete')->name('donation-image-delete');
        Route::post('/donation-image-save/{id}','DonationController@donation_image_save')->name('donation-image-save');
        
        Route::get('/donation-delete/{id}','DonationController@donation_delete')->name('donation-delete');
    });

    //User
    Route::group(['prefix' => 'user'], function () {
        Route::post('/user-registration','UserController@userRegistration')->name('user-registration');
        Route::post('/user-login','UserController@userLogin')->name('user-login');
        Route::get('/user-logout','UserController@userLogout')->name('user-logout');
        Route::get('/user-profile','UserController@userProfile')->name('user-profile');
        Route::get('/user-profile-edit','UserController@userProfileEdit')->name('user-profile-edit');
        Route::post('/user-profile-update','UserController@userProfileUpdate')->name('user-profile-update');
        Route::get('/user-password-change','UserController@userPasswordChange')->name('user-password-change');
        Route::post('/password-change-update','UserController@passwordChangeUpdate')->name('password-change-update');
    });
});


//Multiple Authentication
//https://medium.com/@sagarmaheshwary31/laravel-multiple-guards-authentication-setup-and-login-2761564da986