<?php
Route::group(['namespace'=>'Amcoders\Theme\jomidar\http\controllers','middleware'=>'web'],function(){
	//  Route::get('/home','WelcomeController@index')->name('home');
    Route::get('/','WelcomeController@new_home')->name('new.home');
    //for change language
    Route::get('lang/change', 'WelcomeController@change')->name('changeLang');
});




