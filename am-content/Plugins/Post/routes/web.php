<?php 

Route::post('locations/info','Amcoders\Plugin\Post\http\controllers\LocationController@info')->name('locations.info');
Route::group(['namespace'=>'Amcoders\Plugin\Post\http\controllers','middleware'=>['web','auth','admin'],'prefix'=>'admin','as'=>'admin.'],function(){	
		

		Route::resource('location', 'LocationController');

		Route::resource('review', 'ReviewController');
		Route::post('reviews/destroy', 'ReviewController@destroy')->name('reviews.destroy');

		Route::resource('testimonial', 'TestimonialController');
		Route::post('testimonials/destroy', 'TestimonialController@destroy')->name('testimonials.destroy');

		Route::post('location/destroy', 'LocationController@destroy')->name('locations.destroy');

		Route::post('locations/info','LocationController@info')->name('locations.info');

		Route::get('locations/countries', 'LocationController@Countries')->name('countries.index');
		Route::get('locations/countries/create', 'LocationController@CountriesCreate')->name('countries.create');

		Route::get('locations/states', 'LocationController@States')->name('states.index');
		Route::get('locations/states/create', 'LocationController@StatesCreate')->name('states.create');


		Route::get('locations/cities', 'LocationController@Cities')->name('cities.index');
		Route::get('locations/cities/create', 'LocationController@CitiesCreate')->name('cities.create');



	Route::group(['prefix'=>'real-state'], function(){


		Route::resource('feature', 'FeaturesController');


		Route::resource('status', 'StatusController');
		Route::post('statuses/destroy', 'StatusController@destroy')->name('statuses.destroy');
		Route::resource('input', 'InputController');


		Route::resource('project', 'ProjectController');
		Route::post('projects/destroy', 'ProjectController@destroy')->name('projects.destroy');
		Route::get('projects/{type}', 'ProjectController@index')->name('projects');

		Route::resource('investor', 'InvestorController');
		Route::post('features/destroy', 'FeaturesController@destroy')->name('features.destroy');

		Route::get('facilities', 'FeaturesController@facilities')->name('facilities.index');
		Route::get('facilities/create', 'FeaturesController@facilitiescreate')->name('facilities.create');

		Route::resource('category', 'CategoryController');
		Route::post('category/destroy', 'CategoryController@destroy')->name('category.destroy');

		Route::resource('property', 'PropertyController');
		Route::post('properties/destroy', 'PropertyController@destroy')->name('properties.destroy');
		Route::post('properties/user', 'PropertyController@findUser')->name('properties.findUser');

	});

	// Agent Routes
	Route::get('agent','UserController@agent')->name('agent.index');
	Route::get('agent/create','UserController@agent_create')->name('agent.create');
	Route::post('agent/store','UserController@agent_store')->name('agent.store');
	Route::get('agent/{id}/edit','UserController@agent_edit')->name('agent.edit');
	Route::get('agent/login/{id}','UserController@login')->name('agent.login');
	Route::post('agent/{id}/update','UserController@agent_update')->name('agent.update');
	Route::post('agent/delete','UserController@destroy')->name('agent.destroy');

	// Agency Routes
	Route::get('agency','UserController@agency')->name('agency.index');
	Route::get('agency/create','UserController@agency_create')->name('agency.create');
	Route::post('agency/store','UserController@agency_store')->name('agency.store');
	Route::get('agency/{id}/edit','UserController@agency_edit')->name('agency.edit');
	Route::post('agency/{id}/update','UserController@agency_update')->name('agency.update');
	Route::post('agency/delete','UserController@delete')->name('agency.delete');

});