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
    return view('auth.login');
});

Auth::routes();

Route::match(['get','post'],'/home', 'HomeController@index')->name('home');
Route::post('arenaoverview','ArenaOverviewController@store')->name('arenaoverview.store');
Route::get('users','UsersController@index')->name('admin.users');
Route::get('activitylogs','ActivityLogsController@index')->name('admin.activitylogs');