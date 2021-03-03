<?php
Auth::routes();
Route::group(['middleware' => 'web' ], function() {

    Route::get('/', 'HomeController@index');
    Route::get('{any}', 'HomeController@index')->name('app')->where('any', '.*');

});

