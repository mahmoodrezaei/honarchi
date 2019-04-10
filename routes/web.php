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
    return view('public.layouts.master');
});

Route::get('/api/admin/options', 'API\Admin\ProductOptionController@index');
Route::post('/api/admin/options', 'API\Admin\ProductOptionController@store');