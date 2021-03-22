<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->group(function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::get('refresh', 'AuthController@refresh');
    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('user', 'AuthController@user');
        Route::post('logout', 'AuthController@logout');
    });
});

Route::group(['middleware' => 'auth:api'], function(){
    // Users
    Route::get('users', 'UserController@index')->middleware('isAdmin');
    Route::get('users/{id}', 'UserController@show')->middleware('isAdminOrSelf');
});

Route::get('orders', 'OrderController@indexo');
Route::group(['prefix' => 'order'], function () {
    Route::post('addo', 'OrderController@addo');
    Route::get('edito/{id}', 'OrderController@edito');
    Route::post('updateo/{id}', 'OrderController@updateo');
    Route::delete('deleteo/{id}', 'OrderController@deleteo');
});

Route::get('suppliers', 'SupplierController@indexs');
Route::group(['prefix' => 'supplier'], function () {
    Route::post('adds', 'SupplierController@adds');
    Route::get('edits/{id}', 'SupplierController@edits');
    Route::post('updates/{id}', 'SupplierController@updates');
    Route::delete('deletes/{id}', 'SupplierController@deletes');
});

Route::get('products', 'ProductController@indexp');
Route::group(['prefix' => 'product'], function () {
    Route::post('addp', 'ProductController@addp');
    Route::get('editp/{id}', 'ProductController@editp');
    Route::post('updatep/{id}', 'ProductController@updatep');
    Route::delete('deletep/{id}', 'ProductController@deletep');
});

Route::get('orderdetails', 'OrderDetailController@indexod');
Route::group(['prefix' => 'orderdetail'], function () {
    Route::post('addod', 'OrderDetailController@addod');
    Route::get('editod/{id}', 'OrderDetailController@editod');
    Route::post('updatod/{id}', 'OrderDetailController@updateod');
    Route::delete('deleteod/{id}', 'OrderDetailController@deleteod');
});

Route::get('supplierproducts', 'SupplierProductController@indexsp');
Route::group(['prefix' => 'supplierproduct'], function () {
    Route::post('addsp', 'SupplierProductController@addsp');
    Route::get('editsp/{id}', 'SupplierProductController@editsp');
    Route::post('updatesp/{id}', 'SupplierProductController@updatsp');
    Route::delete('deletesp/{id}', 'SupplierProductController@deletesp');
});

