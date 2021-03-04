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
Route::group(['prefix'=>'v1','middleware' => 'web'], function(){
    Route::get('books','Books\BooksController@index');
    Route::get('books/delete/{id}','Books\BooksController@delete');
    Route::get('book/details/{id}','Books\BooksController@details');
    Route::post('book/save','Books\BooksController@save');

});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
