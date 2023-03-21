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

		Route::get('locations/district', 'LocationController@district')->name('district.index');
		Route::get('locations/district/create', 'LocationController@districtCreate')->name('district.create');
		Route::post('locations/district/destroy', 'LocationController@districtdestroy')->name('district.destroy');

		Route::get('locations/cities', 'LocationController@Cities')->name('cities.index');
		Route::get('locations/cities/create', 'LocationController@CitiesCreate')->name('cities.create');
		Route::get('locations/cities/edit/{id}', 'LocationController@Citiesedit')->name('cities.edit');
		Route::post('locations/cities/destroy', 'LocationController@Citiesdestroy')->name('cities.destroy');


	Route::group(['prefix'=>'real-state'], function(){


		Route::resource('feature', 'FeaturesController');

		Route::resource('status', 'StatusController');
		Route::post('statuses/destroy', 'StatusController@destroy')->name('statuses.destroy');
		Route::resource('input', 'InputController');
		Route::post('input/destroy', 'InputController@destroy')->name('input.destroy');


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
        Route::put('update-second/property/{id}', 'PropertyController@second_update_property')->name('property.second_update_property');
        Route::put('update-third/property/{id}', 'PropertyController@third_update_property')->name('property.third_update_property');
        Route::put('update-forth/property/{id}', 'PropertyController@fourth_update_property')->name('property.fourth_update_property');
        Route::put('update-fifth/property/{id}', 'PropertyController@fifth_update_property')->name('property.fifth_update_property');
        Route::put('update-sixth/property/{id}', 'PropertyController@sixth_update_property')->name('property.sixth_update_property');


//        Show every step agains data route

        Route::put('update-sixth/property/{id}', 'PropertyController@sixth_update_property')->name('property.sixth_update_property');

        Route::post('properties/destroy', 'PropertyController@destroy')->name('properties.destroy');
		Route::post('', 'PropertyController@destroy')->name('properties.destroy');
		Route::post('properties/user', 'PropertyController@findUser')->name('properties.findUser');
        Route::get('get_property_type', 'PropertyController@get_property_type');

        Route::get('get_data/{id}', 'PropertyController@get_data');
        Route::get('all_features/{id}', 'PropertyController@get_all_features');
		//land block
		Route::get('land-block', 'PropertyController@land_block_index')->name('property.land-block');
        Route::get('land-block/edit/{id}', 'PropertyController@land_block_edit')->name('property.land_block_edit');
        Route::get('land-block-show/{id}', 'PropertyController@land_block_show')->name('property.land-block-show');
		Route::get('land-block/create', 'PropertyController@land_block_create')->name('property.land-block-craete');
		Route::post('block_store', 'PropertyController@block_store')->name('property.block_store');
		Route::post('block_update', 'PropertyController@block_update')->name('property.block_update');
        Route::get('property_nature/{id?}', 'PropertyController@property_nature')->name('property.property_nature');
        Route::get('parent_property', 'PropertyController@parent_property')->name('property.parent_property');
		//download csv
		Route::get('download-csv', 'PropertyController@csv_page')->name('property.csv_page');
		Route::get('download-csv-type/{id}', 'PropertyController@show_csv_specified')->name('property.csv_page_type');
		Route::get('get_property_data/{id}', 'PropertyController@get_property_data');
        //property type
	    Route::get('property_type/{id}', 'PropertyController@property_type')->name('properties.type');
		Route::post('/export-csv', 'PropertyController@exportCSV')->name('properties.csv_download');
		//property logs
		Route::get('get_property_logs/{id}', 'PropertyController@get_property_logs')->name('properties.property_logs');
        //update Property
//      Route::post('update_property', 'PropertyController@update_property')->name('property.update_property');
		Route::get('get_districts/{id}', 'PropertyController@get_districts');
        Route::get('get_district','PropertyController@info')->name('property.district');

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
