<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
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

// Route::get('/', 'App\Http\Controllers\AdminController@loginAdmin');
// Route::post('/', 'App\Http\Controllers\AdminController@postLoginAdmin');

Route::get('/home', function () {
    return view('home');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [
        'as' => 'admin.login',
        'uses' => 'App\Http\Controllers\AdminController@loginAdmin'
    ]);
    Route::post('/', [
        'as' => 'admin.post-login',
        'uses' => 'App\Http\Controllers\AdminController@postLoginAdmin'
    ]);

    Route::get('/logout', [
        'as' => 'admin.logout',
        'uses' => 'App\Http\Controllers\AdminController@logout'
    ]);

    //Categoris
    Route::prefix('categories')->group(function () {
        Route::get('/', [
            'as' => 'categories.index',
            'uses' => 'App\Http\Controllers\CategoryController@index',
            'middleware' => 'can:category-list'
        ]);

        Route::get('/create', [
            'as' => 'categories.create',
            'uses' => 'App\Http\Controllers\CategoryController@create',
            'middleware' => 'can:category-add'
        ]);
        Route::post('/store', [
            'as' => 'categories.store',
            'uses' => 'App\Http\Controllers\CategoryController@store',
        ]);
        Route::get('/edit/{id}', [
            'as' => 'categories.edit',
            'uses' => 'App\Http\Controllers\CategoryController@edit',
            'middleware' => 'can:category-edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'categories.update',
            'uses' => 'App\Http\Controllers\CategoryController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'categories.delete',
            'uses' => 'App\Http\Controllers\CategoryController@delete',
            'middleware' => 'can:category-delete'
        ]);
    });

    //Menus
    Route::prefix('menus')->group(function () {
        Route::get('/', [
            'as' => 'menus.index',
            'uses' => 'App\Http\Controllers\MenuController@index',
            'middleware' => 'can:menu-list'

        ]);

        Route::get('/create', [
            'as' => 'menus.create',
            'uses' => 'App\Http\Controllers\MenuController@create'
        ]);

        Route::post('/store', [
            'as' => 'menus.store',
            'uses' => 'App\Http\Controllers\MenuController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'menus.edit',
            'uses' => 'App\Http\Controllers\MenuController@edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'menus.update',
            'uses' => 'App\Http\Controllers\MenuController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'menus.delete',
            'uses' => 'App\Http\Controllers\MenuController@delete'
        ]);
    });

    //Products
    // Route::prefix('product')->group(function () {
    //     Route::get('/', [
    //         'as' => 'product.index',
    //         'uses' => 'App\Http\Controllers\AdminProductController@index',
    //         'middleware' => 'can:product-list'

    //     ]);

    //     Route::get('/create', [
    //         'as' => 'product.create',
    //         'uses' => 'App\Http\Controllers\AdminProductController@create'
    //     ]);

    //     Route::post('/store', [
    //         'as' => 'product.store',
    //         'uses' => 'App\Http\Controllers\AdminProductController@store'
    //     ]);

    //     Route::get('/edit/{id}', [
    //         'as' => 'product.edit',
    //         'uses' => 'App\Http\Controllers\AdminProductController@edit',
    //         'middleware' => 'can:product-edit,id'
    //     ]);

    //     Route::post('/update/{id}', [
    //         'as' => 'product.update',
    //         'uses' => 'App\Http\Controllers\AdminProductController@update'
    //     ]);

    //     Route::get('/delete/{id}', [
    //         'as' => 'product.delete',
    //         'uses' => 'App\Http\Controllers\AdminProductController@delete'
    //     ]);
    // });

    //Slider
    Route::prefix('slider')->group(function () {
        Route::get('/', [
            'as' => 'slider.index',
            'uses' => 'App\Http\Controllers\AdminSliderController@index'
        ]);

        Route::get('/create', [
            'as' => 'slider.create',
            'uses' => 'App\Http\Controllers\AdminSliderController@create'
        ]);

        Route::post('/store', [
            'as' => 'slider.store',
            'uses' => 'App\Http\Controllers\AdminSliderController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'slider.edit',
            'uses' => 'App\Http\Controllers\AdminSliderController@edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'slider.update',
            'uses' => 'App\Http\Controllers\AdminSliderController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'slider.delete',
            'uses' => 'App\Http\Controllers\AdminSliderController@delete'
        ]);
    });

    //Settings
    Route::prefix('settings')->group(function () {
        Route::get('/', [
            'as' => 'settings.index',
            'uses' => 'App\Http\Controllers\AdminSettingController@index'
        ]);

        Route::get('/create', [
            'as' => 'settings.create',
            'uses' => 'App\Http\Controllers\AdminSettingController@create'
        ]);

        Route::post('/store', [
            'as' => 'settings.store',
            'uses' => 'App\Http\Controllers\AdminSettingController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'settings.edit',
            'uses' => 'App\Http\Controllers\AdminSettingController@edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'settings.update',
            'uses' => 'App\Http\Controllers\AdminSettingController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'settings.delete',
            'uses' => 'App\Http\Controllers\AdminSettingController@delete'
        ]);
    });

    //Users
    Route::prefix('users')->group(function () {
        Route::get('/', [
            'as' => 'users.index',
            'uses' => 'App\Http\Controllers\AdminUserController@index'
        ]);

        Route::get('/create', [
            'as' => 'users.create',
            'uses' => 'App\Http\Controllers\AdminUserController@create'
        ]);

        Route::post('/store', [
            'as' => 'users.store',
            'uses' => 'App\Http\Controllers\AdminUserController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'users.edit',
            'uses' => 'App\Http\Controllers\AdminUserController@edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'users.update',
            'uses' => 'App\Http\Controllers\AdminUserController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'users.delete',
            'uses' => 'App\Http\Controllers\AdminUserController@delete'
        ]);
    });

    //Roles
    Route::prefix('roles')->group(function () {
        Route::get('/', [
            'as' => 'roles.index',
            'uses' => 'App\Http\Controllers\AdminRoleController@index'
        ]);

        Route::get('/create', [
            'as' => 'roles.create',
            'uses' => 'App\Http\Controllers\AdminRoleController@create'
        ]);

        Route::post('/store', [
            'as' => 'roles.store',
            'uses' => 'App\Http\Controllers\AdminRoleController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'roles.edit',
            'uses' => 'App\Http\Controllers\AdminRoleController@edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'roles.update',
            'uses' => 'App\Http\Controllers\AdminRoleController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'roles.delete',
            'uses' => 'App\Http\Controllers\AdminRoleController@delete'
        ]);
    });

    //Permissions
    Route::prefix('permissions')->group(function () {
        Route::get('/create', [
            'as' => 'permissions.create',
            'uses' => 'App\Http\Controllers\AdminPermissionController@create'
        ]);

        Route::post('/store', [
            'as' => 'permissions.store',
            'uses' => 'App\Http\Controllers\AdminPermissionController@store'
        ]);
    });
});
