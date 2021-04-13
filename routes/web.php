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

use App\Http\Controllers\MainController;

Route::get('/', function () {
    return view('main.welcome');
});

Route::get('home', 'MainController@index')->name('index');
Route::get('welcome', 'MainController@welcome')->name('welcome');
Route::get('about', 'MainController@about')->name('about');

Route::post('store', 'ProfileController@store')->name('profiles.store');
Route::get('show', 'ProfileController@show')->name('profiles.show');
Route::get('edit', 'ProfileController@edit')->name('profiles.edit');
Route::put('update/{id}', 'ProfileController@update')->name('profiles.update');
Route::get('joblist', 'UserController@listjob')->name('user.listjob');

Auth::routes();

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('admin', 'AdminController@index')->name('admin');
    Route::get('listjob', 'AdminController@listjob')->name('admin.listjob');
    Route::get('createjob', 'AdminController@createjob')->name('admin.createjob');
    Route::post('storejob', 'AdminController@storejob')->name('admin.storejob');
    Route::get('editjob/{id}', 'AdminController@editjob')->name('admin.editjob');
    Route::put('updatejob/{id}', 'AdminController@updatejob')->name('admin.updatejob');
    Route::get('deletejob/{id}', 'AdminController@deletejob')->name('admin.deletejob');
    Route::get('listapp', 'AdminController@listapp')->name('admin.listapp');
    Route::put('approval/{id}', 'AdminController@approval')->name('admin.approval');
    Route::get('showuser/{id}', 'AdminController@showuser')->name('admin.showuser');
    Route::get('showjob/{id}', 'AdminController@showjob')->name('admin.showjob');
    Route::get('listuser', 'AdminController@listuser')->name('admin.listuser');
    Route::get('deleteuser/{id}', 'AdminController@deleteuser')->name('admin.deleteuser');
});

Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('user', 'UserController@index')->name('user');
    Route::get('viewjob/{id}', 'UserController@viewjob')->name('user.viewjob');
    Route::post('applyjob/{id}', 'UserController@applyjob')->name('user.applyjob');
    Route::get('destroy/{id}', 'UserController@destroy')->name('user.destroy');
});
