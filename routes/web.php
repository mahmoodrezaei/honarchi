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
// TODO: add login and logout for routes
Route::get('/admin/{any?}', 'AdminController@index')
    ->middleware('assign.guard:staff,staff/login')
    ->where('any', '.*');

// Routes for staff login and logout
Route::get('staff/login', 'Auth\Admin\LoginController@showLoginForm');
Route::post('staff/login', 'Auth\Admin\LoginController@login')->name('admin.login');
Route::post('staff/logout', 'Auth\Admin\LoginController@logout')->name('admin.logout');

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
    Route::get('/', 'API\Admin\ProductController@index')->middleware('assign.guard:staff');
    Route::get('/names', 'API\Admin\ProductController@indexNames');
    Route::post('/', 'API\Admin\ProductController@store');
    Route::get('/{product}/show', 'API\Admin\ProductController@show');
    Route::patch('/{product}/update', 'API\Admin\ProductController@update');
    Route::get('{product}/attributes','API\Admin\ProductController@getAttributes');
    Route::post('{product}/attributes','API\Admin\ProductController@syncAttributes');
    Route::get('/{product}/options', 'API\Admin\ProductController@getOptions');
    Route::post('/{product}/options', 'API\Admin\ProductController@syncOptions');
    Route::get('/{product}/recommendations', 'API\Admin\ProductController@getRecommendations');
    Route::post('/{product}/recommendations', 'API\Admin\ProductController@syncRecommendations');
    Route::get('/{product}/variants', 'API\Admin\ProductController@getVariants');
    Route::post('/{product}/variants', 'API\Admin\ProductController@syncVariants');
    Route::delete('/variants/{variant}', 'API\Admin\ProductController@destroyVariant');

    Route::post('/{product}/gallery', 'API\Admin\ProductController@syncGallery');
    Route::get('/{product}/gallery', 'API\Admin\ProductController@getGallery');
    Route::delete('/{product}/image/{image}', 'API\Admin\ProductController@destroyImage');
    Route::delete('/{product}', 'API\Admin\ProductController@destroyProduct');

});

// blog routes
Route::prefix('/api/admin/articles')->namespace('API\Admin')->group( function () {
    Route::get('/', 'ArticleController@index');
    Route::get('/{article}', 'ArticleController@show');
    Route::put('/{article}/update', 'ArticleController@update');
    Route::post('/', 'ArticleController@store');
});


// Public Routes
// index page
Route::get('/', function() {
    return view('public.index');
});

// profile routes
Route::get('/profile/{any?}', 'User\ProfileController@index')
    ->where('any', '.*')
    ->middleware('auth');

Route::prefix('/api/user/profile')
    ->namespace('User')
    ->group( function() {
        Route::get('/info', 'ProfileController@show');
        Route::post('/info', 'ProfileController@store');
        Route::post('/avatar', 'AvatarController@store');
        Route::get('/address', 'AddressController@index');
        Route::post('/address', 'AddressController@store');
        Route::patch('/address/{address}', 'AddressController@update');
        Route::delete('/address/{address}', 'AddressController@destroy');
});

// products routes
Route::prefix('/products')->group( function () {
    Route::get('/', 'User\ProductController@index');
    Route::get('/{slug}', 'User\ProductController@show');
});

// blog routes
Route::prefix('/blog')->group( function() {
    Route::get('/', 'User\ArticleController@index');
    Route::get('/{blog}', 'User\ArticleController@show');
});