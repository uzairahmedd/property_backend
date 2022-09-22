<?php 


Route::group(['namespace'=>'Amcoders\Plugin\currency\http\controllers','middleware'=>['web','auth','admin'],'prefix'=>'admin','as'=>'admin.'],function(){
	Route::resource('currency', 'CurrencyController');
	Route::post('currency/destroy','CurrencyController@destroy')->name('currency.destroy');
});