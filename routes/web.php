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

Route::get('/api/admin/galleries', 'API\Admin\GalleryController@index');
Route::post('/api/admin/galleries', 'API\Admin\GalleryController@store');
Route::get('/api/admin/galleries/{gallery}', 'API\Admin\GalleryController@show');
Route::patch('/api/admin/galleries/{gallery}', 'API\Admin\GalleryController@update');
Route::patch('/api/admin/galleries/{gallery}/approve', 'API\Admin\GalleryController@approveGallery');
Route::patch('/api/admin/galleries/{gallery}/block', 'API\Admin\GalleryController@blockGallery');
Route::patch('/api/admin/galleries/{gallery}/unblock', 'API\Admin\GalleryController@unblockGallery');
Route::patch('/api/admin/galleries/{gallery}/unblock', 'API\Admin\GalleryController@unblockGallery');

Route::prefix('/api/admin/products')->group(function () {
    Route::get('/', 'API\Admin\ProductController@index');
    Route::get('/names', 'API\Admin\ProductController@indexNames');
    Route::post('/', 'API\Admin\ProductController@store');
    Route::get('/{product}/show', 'API\Admin\ProductController@show');
    Route::patch('/{product}/update', 'API\Admin\ProductController@update');
    Route::post('/{product}/options', 'API\Admin\ProductController@syncOptions');
    Route::get('/{product}/recommendations', 'API\Admin\ProductController@getRecommendations');
    Route::post('/{product}/recommendations', 'API\Admin\ProductController@syncRecommendations');
});