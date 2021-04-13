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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('user', 'UserController@index')->name('user');
    Route::get('viewjob/{id}', 'UserController@viewjob')->name('user.viewjob');
    Route::post('applyjob/{id}', 'UserController@applyjob')->name('user.applyjob');
    Route::get('destroy/{id}', 'UserController@destroy')->name('user.destroy');
});
Route::get('user', 'UserController@index')->name('user');