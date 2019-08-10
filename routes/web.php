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
//Auth::routes();

//Route::group(['middleware'=>'auth'],function (){
Route::get('/logout/custom',['as'=>'logout.custom','uses'=>'Controller@userLogout']);
    Route::group(['prefix'=>'book'],function (){
        Route::get('/create','bookController@create');
        Route::post('/create',['as'=>'book.create','uses'=>'bookController@store']);
        Route::get('/all/{num?}',['as'=>'book.index','uses'=>'bookController@index']);
        Route::get('/destroy/{id?}',['as'=>'book.destroy','uses'=>'bookController@destroy']);
        Route::get('/edit/{id}',['as'=>'book.edit','uses'=>'bookController@edit']);
        Route::put('update/{id}', ['as' => 'book.update', 'uses' => 'bookController@update']);
    });
    Route::group(['prefix'=>'category'],function (){
        Route::get('/create','categoryController@create');
        Route::post('/create',['as'=>'category.create','uses'=>'categoryController@store']);
        Route::get('/all/{num?}',['as'=>'category.index','uses'=>'categoryController@index']);
        Route::get('/destroy/{id?}',['as'=>'category.destroy','uses'=>'categoryController@destroy']);
        Route::get('/edit/{id}',['as'=>'category.edit','uses'=>'categoryController@edit']);
        Route::put('/update/{id}',['as'=>'category.update','uses'=>'categoryController@update']);

    });
    Route::group(['prefix'=>'library'],function (){
        Route::get('/create','libraryController@create');
        Route::post('/create',['as'=>'library.create','uses'=>'libraryController@store']);
        Route::get('/all/{num?}',['as'=>'library.index','uses'=>'libraryController@index']);
        Route::get('/destroy/{id?}',['as'=>'library.destroy','uses'=>'libraryController@destroy']);
        Route::get('/edit/{id}',['as'=>'library.edit','uses'=>'libraryController@edit']);
        Route::put('/update/{id}',['as'=>'library.update','uses'=>'libraryController@update']);

    });
    Route::group(['prefix'=>'user'],function (){
        Route::get('/all/{num?}',['as'=>'user.index','uses'=>'userController@index']);
        Route::get('/destroy/{id?}',['as'=>'user.destroy','uses'=>'userController@destroy']);
        Route::get('/edit/{id}',['as'=>'user.edit','uses'=>'userController@edit']);
        Route::put('/update/{id}',['as'=>'user.update','uses'=>'userController@update']);
        Route::get('/emails/{id}',['as'=>'user.email','uses'=>'userController@sendEmail']);
        Route::get('/profile/{id}',['as'=>'user.profile','uses'=>'userController@viewProfile']);
        Route::get('/requests/{id}',['as'=>'user.requests','uses'=>'userController@viewRequests']);
        Route::get('/userEnabled/{id}/{statues}',['as'=>'user.userEnabled','uses'=>'userController@userEnabled']);
    });
    Route::group(['prefix'=>'request'],function (){
        Route::get('/all/{num?}',['as'=>'request.index','uses'=>'requestController@index']);
        Route::get('/userProfile/{id}',['as'=>'request.userProfile','uses'=>'requestController@userProfile']);
    });
    Route::group(['prefix'=>'admin'],function (){
//        Route::get('/all/{num?}',['as'=>'admin.index','uses'=>'adminController@index']);
        Route::get('/dashboard',['as'=>'admin.home','uses'=>'adminController@home']);
        Route::get('profile',['as'=>'admin.profile','uses'=>'adminController@viewProfile']);
        Route::get('/edit/{id}',['as'=>'admin.edit','uses'=>'adminController@edit']);
        Route::put('/update/{id}',['as'=>'admin.update','uses'=>'adminController@update']);
    });
    Route::group(['prefix'=>'op'],function (){
        Route::get('/all',['as'=>'op.index','uses'=>'operationsController@index']);
        Route::get('/destroy/{id?}',['as'=>'op.destroy','uses'=>'operationsController@destroy']);
//        Route::get('/create','operationsController@create');
//        Route::post('/create',['as'=>'op.create','uses'=>'operationsController@store']);
        Route::get('/edit/{id}',['as'=>'op.edit','uses'=>'operationsController@edit']);
        Route::get('/store',['as'=>'op.store','uses'=>'operationsController@store']);
        Route::put('/update/{id}',['as'=>'op.update','uses'=>'operationsController@update']);
    });
    Route::get('/language/{lang}', ['as' => 'language.change',
        'uses' => 'LocalizationController@change'
    ]);
//});
Route::get('/post/{id}', ['as' => 'post.show', 'uses' => 'PostController@show']);
Route::get('/video/create','videoController@create');
Route::get('/video/search',['as'=>'video.search','uses'=>'videoController@search']);



Route::get('/home', 'HomeController@index')->name('home');
