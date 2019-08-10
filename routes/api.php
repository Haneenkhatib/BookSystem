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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('user/store',['as'=>'user.store','uses'=>'api\userController@store']);

Route::group(['namespace'=>'api','middleware'=>'auth:api'],function (){
    Route::group(['prefix'=>'user'],function (){
        Route::put('/update/{id}',['as'=>'user.update','uses'=>'userController@update']);
        Route::delete('/destroy/{id?}',['as'=>'user.destroy','uses'=>'userController@destroy']);
        Route::get('/show/{id?}',['as'=>'user.show','uses'=>'userController@show']);
    });
    Route::group(['prefix'=>'request'],function () {
        Route::put('/update/{id}',['as'=>'request.update','uses'=>'requestController@update']);
        Route::delete('/destroy/{id?}',['as'=>'request.destroy','uses'=>'requestController@destroy']);
    });

});