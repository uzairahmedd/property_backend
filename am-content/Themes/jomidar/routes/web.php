<?php
Route::group(['namespace'=>'Amcoders\Theme\jomidar\http\controllers','middleware'=>'web'],function(){
	Route::get('/','WelcomeController@index')->name('home');
    Route::get('/home','WelcomeController@new_home')->name('new.home');
});


