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

Route::get('/admin', 'App\Http\Controllers\AdminController@loginAdmin');
Route::post('/admin', 'App\Http\Controllers\AdminController@postLoginAdmin');

Route::get('/home', function () {
    return view('home');
});

Route::prefix('admin')->group(function () {
    //Categoris
    Route::prefix('categories')->group(function () {
        Route::get('/', [
            'as' => 'categories.index',
            'uses' => 'App\Http\Controllers\CategoryController@index'
        ]);
    
        Route::get('/create', [
            'as' => 'categories.create',
            'uses' => 'App\Http\Controllers\CategoryController@create'
        ]);
        Route::post('/store', [
            'as' => 'categories.store',
            'uses' => 'App\Http\Controllers\CategoryController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'categories.edit',
            'uses' => 'App\Http\Controllers\CategoryController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'categories.update',
            'uses' => 'App\Http\Controllers\CategoryController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'categories.delete',
            'uses' => 'App\Http\Controllers\CategoryController@delete'
        ]);
    });
    
    //Menus
    Route::prefix('menus')->group(function () {
        Route::get('/', [
            'as' => 'menus.index',
            'uses' => 'App\Http\Controllers\MenuController@index'
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
    Route::prefix('product')->group(function () {
        Route::get('/', [
            'as' => 'product.index',
            'uses' => 'App\Http\Controllers\AdminProductController@index'
        ]);

        Route::get('/create', [
            'as' => 'product.create',
            'uses' => 'App\Http\Controllers\AdminProductController@create'
        ]);
    
    });
});


