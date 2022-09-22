<?php 



Route::group(['namespace'=>'Amcoders\Plugin\Paymentgetway\http\controllers','middleware'=>['web','auth']],function(){
	
	Route::get('paypal-fallback','PaypalController@paypal_success_payment')->name('paypal_fallback');


	Route::get('toyyibpay-fallback','ToyyibpayController@status')->name('toyyibpay.fallback');


	Route::get('instamojo-fallback','InstamojoController@status')->name('instamojo.fallback');

	Route::get('mollie-fallback','MollieController@status')->name('mollie.fallback');

	Route::post('razorpay/status','RazorpayController@status')->name('razorpay.status');

});

Route::group(['namespace'=>'Amcoders\Plugin\Paymentgetway\http\controllers\admin','middleware'=>['web','auth','admin'],'prefix'=>'admin','as'=>'admin.'],function(){
	
	Route::resource('payment', 'PaymentController');
	Route::resource('transaction', 'TransactionController');

});