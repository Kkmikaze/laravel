<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::get('books', 'BookController@books')->middleware('jwt.verify');
Route::post('book', 'BookController@store')->middleware('jwt.admin');
Route::put('book/{id}', 'BookController@update')->middleware('jwt.admin');
Route::delete('book/{id}', 'BookController@destroy')->middleware('jwt.admin');

Route::post('lease', 'LeaseController@lease')->middleware('jwt.user');

Route::get('user', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');
Route::get('book/{id}', 'BookController@book');