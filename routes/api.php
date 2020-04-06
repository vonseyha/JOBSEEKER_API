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

Route::post('/user/create','UserController@register');
Route::get('/user/read','UserController@read');
Route::get('/user/login/{email}/{password}','UserController@login');
Route::post('/user/update/{username}','UserController@update');
Route::delete('/user/delete/{id}','UserController@delete');
Route::get('/user/showemail/{email}','UserController@readByemail');

Route::post('/postjob/create','JobpostController@store');
Route::get('/postjob/read','JobpostController@read');
Route::get('/postjob/showbyemail/{id}','JobpostController@readByemail');
Route::post('/postjob/update/{Companyname}','JobpostController@update');
Route::delete('/postjob/delete/{id}','JobpostController@delete');
Route::post('/postjob/updateprofile/{id}','JobpostController@updateProfile');
Route::post('/postjob/readtypejob/{Title}','JobpostController@readTypeJob');
Route::post('/postjob/save','JobpostController@save');

Route::post('/postcv/create','CvpostController@store');
Route::get('/postcv/read','CvpostController@read');
Route::get('/postcv/show/{Fullname}','CvpostController@showbyid');
Route::post('/postcv/update/{Fullname}','CvpostController@update');
Route::delete('/postcv/delete/{id}','CvpostController@delete');
Route::post('/postcv/updateprofile/{id}','CvpostController@updateProfile');
Route::post('/postcv/readtypecv/{interest}','CvpostController@readTypeCv');
