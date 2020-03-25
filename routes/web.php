<?php

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

Route::group([
    'prefix' => 'admin'
], function () {
    Auth::routes();
});

/** Backend routes */
Route::group([
    'as' => 'admin.',
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => ['auth', 'role:admin']
], function() {
    Route::get('/', 'DashboardController@index')->name('dashboard.index');
    Route::resource('users', 'UserController')->except(['create', 'store', 'show']);
    Route::resource('categories', 'CategoryController');
    Route::resource('products', 'ProductController')->except('show');
    Route::resource('pages', 'PageController')->except(['show', 'create', 'destroy']);
    Route::resource('orders', 'OrderController')->except('create');

    Route::group([
        'as' => 'media.',
        'prefix' => 'media',
    ], function () {
        Route::post('upload', 'MediaController@upload')->name('upload');
        Route::delete('{media}', 'MediaController@destroy')->name('destroy');
    });
});

Route::get('/', function () {
    return view('welcome');
});
