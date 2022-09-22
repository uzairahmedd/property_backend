<?php 


Route::group(['namespace'=>'Amcoders\Plugin\plan\http\controllers','middleware'=>['web','auth','admin'],'prefix'=>'admin','as'=>'admin.'],function(){
	Route::resource('plan', 'PlanController');
	Route::post('plan/destroy', 'PlanController@destroy')->name('plan.destroy');

	Route::resource('agency-package', 'AgencypackageController');
	Route::post('agency-packages/destroy', 'AgencypackageController@destroy')->name('agency-packages.destroy');
});