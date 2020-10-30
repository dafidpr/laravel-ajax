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

Route::get('/', 'AuthController@login')->name('login');
Route::post('/login', 'AuthController@postLogin');
Route::get('/logout', 'AuthController@logout');


Route::group(['middleware' => ['checkauth']], function () {
    // Route Dashboard
    Route::get('/dashboard', 'Admin\DashboardController@index');
    
    // Route Users
    Route::get('/user', 'Admin\UserController@index');
    Route::patch('/edit_user/{id}', 'Admin\UserController@update');
    Route::post('/create_user', 'Admin\UserController@store');
    Route::delete('/destroy_user/{id}', 'Admin\UserController@destroy');
    Route::get('/loadData', 'Admin\UserController@loadData');
    Route::get('/user/detail_user/{id}', 'Admin\UserController@show');
    
});



