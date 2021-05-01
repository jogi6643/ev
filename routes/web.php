<?php

Route::get('/','Customer\CustomerController@welcome');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout-customer', 'Customer\CustomerController@logout');

//Admin section router

Route::group(['prefix'=>'admin', 'as'=>'admin.'], function(){

	Route::get('/login', 'Admin\LoginController@showAdminLoginForm');
    Route::post('/login', 'Admin\LoginController@adminLogin');

    //Route::get('/register', 'Admin\RegisterController@showAdminRegisterForm');
    //Route::post('/register', 'Admin\RegisterController@createAdmin');

    Route::post('/logout', 'Admin\LoginController@logout');


    //admin route
    Route::group(['middleware' => 'auth:admin'], function(){

        Route::get('/dashboard', 'Admin\AdminController@index');

        Route::get('/active-status', 'Admin\AdminController@active_status');
        Route::post('/position', 'Admin\AdminController@position');

        Route::post('/selectCategory', 'Admin\AjaxController@selectCategory');
        Route::post('/selectAttribute', 'Admin\AjaxController@selectAttribute');
        Route::post('/selectProduct', 'Admin\AjaxController@selectProduct');
        Route::get('/selectProductOption', 'Admin\AjaxController@selectProductOption');
        

        Route::get('/post', 'Admin\PostController@index')->name('post');
        Route::get('post/create', 'Admin\PostController@create')->name('post.create');
        Route::post('post/store', 'Admin\PostController@store')->name('post.store');
        
        Route::resource('/category', 'Admin\CatagoryController');
        Route::post('/category-status', 'Admin\CatagoryController@status');

        Route::resource('/brand', 'Admin\BrandController');
        Route::post('/brand-status', 'Admin\BrandController@status');
        Route::post('/brand-featured', 'Admin\BrandController@featured');

        Route::resource('/product', 'Admin\ProductController');
        Route::post('/product-status', 'Admin\ProductController@status');

        Route::resource('/user', 'Admin\UserController');
        
        Route::resource('/attribute', 'Admin\AttributeController');
        Route::post('/attributes-status', 'Admin\AttributeController@status');
        
        Route::resource('/coadmin', 'Admin\CoadminController');
        Route::post('/coadmin-status', 'Admin\CoadminController@status');

        Route::resource('/role', 'Admin\LabelController');
        Route::post('/listrole-status', 'Admin\LabelController@status');


        Route::resource('/states', 'Admin\StatesController');
        Route::post('/states-status', 'Admin\StatesController@status');


    });
    
});

// Lending page 
// search car --- code start ---
Route::post('/top-search', 'Customer\CustomerController@top_search');
Route::any('/search-list', 'Customer\CustomerController@search_list');
Route::any('/msearchresult', 'Customer\CustomerController@msearch_type_product');
Route::post('/livesearchdata', 'Customer\CustomerController@livesearchdata');
// search car --- code end ---

Route::get('/evtype/{value}', 'Customer\CustomerController@evtype');
Route::post('livesearchnamedata', 'Customer\CustomerController@livesearchnamedata');
Route::post('livesearchrequirementsdata', 'Customer\CustomerController@livesearchrequirementsdata');
Route::get('/evtypename/{value}/{value1}/{value2}', 'Customer\CustomerController@evtypename');
Route::get('/requirements/{value}/{value1}/{value2}', 'Customer\CustomerController@requirements');
Route::any('/compare-cars','Customer\CustomerController@compare_car');
Route::post('/select-variant','Customer\CustomerController@select_variant');
Route::post('/comparepost','Customer\CustomerController@comparepost');

// search car by brand --- code start ---
Route::post('/selectVehiclename', 'Customer\CustomerController@selectVehiclename');
Route::post('/selectVehiclename2', 'Customer\CustomerController@selectVehiclename2');
Route::post('/selectVehiclename3', 'Customer\CustomerController@selectVehiclename3');
Route::post('/selectVehiclename4', 'Customer\CustomerController@selectVehiclename4');
Route::post('/add-compere-product', 'Customer\CustomerController@add_compere_product');

Route::any('/vehicle-detail', 'Customer\CustomerController@vehicle_detail');
Route::any('/vehicle-details/{id}', 'Customer\CustomerController@vehicle_details');
// search car by brand --- code end ---

// search by requirement --- code start ---
Route::any('/vehicle-detail-by-requirement', 'Customer\CustomerController@vehicle_detail_by_requirement');
Route::any('/twowheeler-detail-by-requirement', 'Customer\CustomerController@twowheeler_detail_by_requirement');
Route::any('/rikshaw-detail-by-requirement', 'Customer\CustomerController@rikshaw_detail_by_requirement');
Route::any('/commercial-detail-by-requirement', 'Customer\CustomerController@commercial_detail_by_requirement');
// search car by requirement --- code end ---

// search car by filter --- code start ---
Route::any('/product-checklist', 'Customer\CustomerController@product_checklist');
Route::any('/batteryproductchecklist', 'Customer\CustomerController@batteryproductchecklist');
Route::any('/productbyprice', 'Customer\CustomerController@productbyprice');
// search car by filter --- code end ---

// compare cars --- code start ---
Route::any('/compare', 'Customer\CustomerController@compare');
