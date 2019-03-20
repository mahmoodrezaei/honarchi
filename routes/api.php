<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::apiResource('permissions', 'API\Admin\PermissionController');

Route::apiResource('roles', 'API\Admin\RoleController');

Route::Resource('categories', 'API\Admin\CategoryController')->except(['show']);

Route::get('features', 'FeatureController@index');

Route::apiResource('products', 'API\Admin\ProductController');

Route::get('admin/galleries', 'API\Admin\GalleryController@index');
Route::post('admin/galleries', 'API\Admin\GalleryController@store');
Route::get('admin/galleries/{gallery}', 'API\Admin\GalleryController@show');
Route::patch('admin/galleries/{gallery}', 'API\Admin\GalleryController@update');
Route::patch('admin/galleries/{gallery}/approve', 'API\Admin\GalleryController@approveGallery');
Route::patch('admin/galleries/{gallery}/block', 'API\Admin\GalleryController@blockGallery');
Route::patch('admin/galleries/{gallery}/unblock', 'API\Admin\GalleryController@unblockGallery');
Route::patch('admin/galleries/{gallery}/unblock', 'API\Admin\GalleryController@unblockGallery');
