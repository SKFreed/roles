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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('right', 'RightController');
Route::resource('role', 'RoleController');
Route::resource('user', 'UserController');
Route::resource('right_user', 'RightUserController')->except(['show', 'create', 'store', 'destroy']);;
Route::resource('role_user', 'RoleUserController')->except(['show', 'create', 'store', 'destroy']);;
Route::resource('right_role', 'RightRoleController')->except(['show', 'create', 'store', 'destroy']);;
