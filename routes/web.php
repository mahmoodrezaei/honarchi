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

// Admin Routes
// TODO: add auth middleware
Route::get('/admin/{any?}', 'AdminController@index')
    ->where('any', '.*');


Route::get('test', function() {
    return view('public.index');
});

Route::get('/api/admin/options', 'API\Admin\ProductOptionController@index');
Route::post('/api/admin/options', 'API\Admin\ProductOptionController@store');
Route::get('/api/admin/options/{option}/show', 'API\Admin\ProductOptionController@show');
Route::put('/api/admin/options/{option}/update', 'API\Admin\ProductOptionController@update');

Route::apiResource('api/admin/attributes', 'API\Admin\ProductAttributeController')->parameters(['attributes' => 'model']);

Route::apiResource('api/admin/categories', 'API\Admin\ProductCategoryController')->parameters(['categories' => 'model']);
