<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Laravel Default Auth Routes
Auth::routes();

// // sitemap route
Route::group(['namespace'=>'App\Http\Controllers'],function(){

	Route::get('/sitemap.xml', 'SettingController@sitemapView');
	Route::get('locale/lang', 'LocalizationController@store')->name('language.set');
	Route::get('/mysettings', 'Admin\UserController@index')->name('admin.admin.mysettings')->middleware('auth');
	Route::post('genup', 'Admin\UserController@genUpdate')->name('admin.users.genupdate')->middleware('auth');
	Route::post('passup', 'Admin\UserController@updatePassword')->name('admin.users.passup')->middleware('auth');

});


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| All Admin routes are here
|
*/

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth', 'admin']], function () {
	//dashboard route
	Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
	Route::get('static_data', 'DashboardController@static_data')->name('static_data');
	Route::get('dashboard/data/{period}', 'DashboardController@dashboardData')->name('dashboard.data');

	// role routes
	Route::resource('role', 'RoleController');
	Route::post('roles/destroy', 'RoleController@destroy')->name('roles.destroy');

	// users routes
	Route::resource('users', 'AdminController');
	Route::post('/userss/destroy', 'AdminController@destroy')->name('users.destroy');

	// page resource route
	Route::resource('page', 'PageController');
	Route::post('pages/destroy', 'PageController@destroy')->name('page.destroy');

	// blog resource route
	Route::resource('blog/post', 'PostController');
	Route::get('/blog/posts','PostController@index')->name('blog.all');
	Route::post('post/destroy', 'PostController@destroy')->name('post.destroys');
	// Route::resource('blog/comment', 'CommentController');
	// Route::get('/comment/disqus', 'CommentController@apiview')->name('dsiqus.settings');
	// Route::post('blog/comments/destroy', 'CommentController@destroy')->name('comments.destroy');
	// Route::get('blog/comments/reply/{id}', 'CommentController@reply')->name('comment.reply');

    // // Disques Comment Route
	// Route::post('disqus', 'CommentController@disqus')->name('disqus.store');

    // theme route
	Route::get('appearance/theme-options', 'ThemeoptionsController@index')->name('theme_option');

	// category route
	Route::post('categorys', 'CategoryController@destroy')->name('categorys.destroy');

	Route::resource('settings', 'SettingsController');
	// menu route
	Route::resource('appearance/menu', 'MenuController');
	Route::post('menues/destroy', 'MenuController@destroy')->name('menues.destroy');
	Route::post('menues/node', 'MenuController@MenuNodeStore')->name('menus.MenuNodeStore');

	//theme route
	Route::get('appearance/theme', 'ThemeController@index')->name('theme.index');
	Route::get('theme/{name}', 'ThemeController@active')->name('theme.active');
	Route::post('theme/upload', 'ThemeController@upload')->name('theme.upload');

	//widget route
	// Route::get('appearance/widget', 'WidgetController@index')->name('widget.index');
	// Route::get('appearance/bank/settings','WidgetController@bank_settings')->name('bank.settings');
	// Route::post('appearance/bank/settings/update','WidgetController@bank_settings_update')->name('bank.settings.update');

	//themeoptions route
	Route::get('appearance/themeoptions', 'ThemeoptionsController@index')->name('themeoptions.index');

	//script route
	// Route::resource('appearance/script', 'ScriptController');

	//Plugin route
	Route::get('plugin', 'PluginController@index')->name('plugin.index');
	Route::get('plugin/active/{plugin}', 'PluginController@active')->name('plugin.active');
	Route::get('plugin/deactive/{plugin}', 'PluginController@deactive')->name('plugin.deactive');
	Route::post('plugin/upload', 'PluginController@upload')->name('plugin.upload');

	//seo route
	Route::resource('setting/seo', 'SeoController');
	Route::get('setting/google-analytics', 'SettingsController@google_analytics')->name('google_analytics');
	Route::post('google_analytics_json', 'SettingsController@google_analytics_update')->name('google_analytics_service');

	//env route
	Route::resource('setting/env', 'EnvController');
	Route::resource('setting/filesystem', 'FilesystemController');

	//performance route
	Route::resource('setting/performance', 'PerfomaceController');

	//general route
	Route::resource('setting/general', 'GensettingsController');

	// permission route
	// Route::get('permission', 'PermissionController@index')->name('permission.index');

	// usersystem route
	Route::get('usersystem', 'UsersystemController@index')->name('usersystem.index');

	// information route
	Route::get('information', 'InformationController@index')->name('information.index');

	//permissions Route
	// Route::resource('permission', 'PermissionController');

	// Backup Route
	Route::get('backup','BackupController@index')->name('backup.index');
	Route::get('backup/store','BackupController@backup')->name('backup.store');
	Route::get('backup/delete/{file}','BackupController@delete')->name('backup.delete');
	Route::get('backup/download/{file}','BackupController@download')->name('backup.download');

	//langauge route
	Route::get('language','LanguageController@index')->name('language.index');
	Route::get('language/create','LanguageController@create')->name('language.create');
	Route::post('lang/store','LanguageController@store')->name('lang.store');
	Route::post('lang/set','LanguageController@set')->name('lang.set');
	Route::get('lang/{lang_code}/delete/{theme_name}','LanguageController@delete')->name('lang.delete');
	Route::get('lang/{lang_code}/edit/{theme_name}','LanguageController@edit')->name('lang.edit');
	Route::post('lang/{lang_code}/update/{theme_name}','LanguageController@update')->name('lang.update');

    // Media Routes
	Route::resource('media', 'MediaController');
	Route::get('medias/upload', 'MediaController@bulk_upload')->name('media.upload');
	Route::get('medias/json', 'MediaController@json')->name('medias.json');
	Route::get('media/info/{id}', 'MediaController@show');
	Route::post('medias/remove', 'MediaController@destroy')->name('medias.destroy');

	// Customizer All Route
	Route::get('customizer','CustomizerController@index')->name('customizer.index');
	Route::get('customizer/page_change','CustomizerController@page_change')->name('customizer.page_change');
	Route::get('customizer/section_option','CustomizerController@section_option')->name('customizer.section_option');
	Route::get('customizer/value_update','CustomizerController@value_update')->name('customizer.value_update');
	Route::get('customizer/multiple_settings_option','CustomizerController@multiple_settings_option')->name('customizer.multiple_settings_option');
	Route::post('customizer/image_upload','CustomizerController@image_upload')->name('customizer.image_upload');
	Route::get('customizer/save','CustomizerController@save')->name('customizer.save');
	Route::get('appearance/theme-options/settings','SettingsController@theme_settings')->name('theme.settings');
	Route::post('appearance/theme-options/settings-update','SettingsController@theme_settings_update')->name('theme.settings.update');

});


/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
| All Frontend routes are here
|
*/

Route::group(['namespace'=>'Amcoders\Theme\jomidar\http\controllers','middleware'=>'web'],function(){
	Route::get('/get_latest_property','DataController@get_latest_property')->name('latest.property');
	Route::get('/get_random_property','DataController@get_random_property')->name('random.property');
	Route::get('agents/data','DataController@agents')->name('agent.data');
	Route::get('recent_property/data','DataController@recent_property')->name('recent_property.data');
	Route::get('page_analytics','DataController@page_analytics');
	Route::get('city/data','DataController@city_data')->name('city.data');
	Route::get('blog/data','DataController@blog_data')->name('blog.data');
	Route::get('review/data','DataController@review')->name('review.data');
	Route::post('mailchamp','MailchampController@store')->name('mailchamp.store');
	Route::get('property/{slug}','PropertyController@show')->name('property.show');
	Route::get('project/{slug}','PropertyController@project_view');
	Route::get('list','PropertyController@list')->name('list');
	Route::get('project','PropertyController@project');
	Route::get('map','PropertyController@map')->name('map');
	Route::get('state/{slug}','PropertyController@city');
	Route::get('get_properties','DataController@get_properties');
	Route::get('get_projects','DataController@get_projects');
	Route::get('reviews','PropertyController@reviews')->name('reviews.data');
	Route::post('review/store','PropertyController@review_store')->name('review.store');
	Route::post('property/inquiryform','PropertyController@inquiryform')->name('property.inquiryform');
	Route::post('mortgage/calculator','PropertyController@calculator')->name('mortgage.calculator');
	Route::get('agent/{slug}/show','AgentshowController@show')->name('agent.show');
	Route::get('agent/property/list/{slug}','AgentshowController@property_get')->name('agent.property');
	Route::get('agent/property/review/get','AgentshowController@review_get')->name('agent.reviews.data');
	Route::get('agency/{slug}/show','AgencyController@show')->name('agency.show');
	Route::get('agency/agent/list','AgencyController@agent_list')->name('agency.agent.list');
	Route::get('agency/property/list','AgencyController@property_list')->name('agency.property.list');
	Route::get('agency/review/list','AgencyController@review_list')->name('agency.review.list');
	Route::get('agent/list','AgentController@list')->name('agent.list');
	Route::get('agent/list/data','AgentController@agents_data')->name('agent.list.data');
	Route::get('agency/list','AgencyController@list')->name('agency.list');
	Route::get('agency/list/data','AgencyController@agency_data')->name('agency.list.data');
	Route::post('property/favourite/request','PropertyController@favourite')->name('property.favourite');
	Route::get('property/favourite/check','PropertyController@favourite_check')->name('favourite.check');
	Route::get('property/similar/data/get','PropertyController@similar_property')->name('property.similar.data');
	Route::get('blog/{slug}','BlogController@show')->name('blog.show');
	Route::get('page/{slug}','BlogController@page_show');
	Route::get('blogs','BlogController@list')->name('blog.list');
	Route::get('change_currency','WelcomeController@change_currency')->name('change_currency');
	Route::post('user/register','RegisterController@register')->name('user.register');
	Route::get('contact','ContactController@index')->name('contact.index');
	Route::post('contact','ContactController@store')->name('contact.store');
});

/*
|--------------------------------------------------------------------------
| Agents Routes
|--------------------------------------------------------------------------
|
| All Agents routes are here
|
*/

Route::group(['as'=>'agent.','prefix','namespace'=>'App\Http\Controllers\Admin','middleware'=>'auth'], function(){
	Route::post('media', 'MediaController@store')->name('media.store');
	Route::post('medias/remove', 'MediaController@destroy')->name('medias.destroy');
});

Route::group(['prefix'=>'agent','as'=>'agent.','namespace'=>'Amcoders\Theme\jomidar\http\controllers\Agent','middleware'=>['web','auth']],function(){

	Route::get('dashboard','DashboardController@index')->name('dashboard');
	Route::resource('property','PropertyController');
	Route::post('contact_type/{id}','PropertyController@contact_type')->name('contact_type');
	Route::post('floor-plan/{id}','PropertyController@floor_plan_store')->name('floor.store');
	Route::get('floor-plan/delete/{id}','PropertyController@floor_plan_delete')->name('floor.delete');
	Route::get('property/delete/{id}','PropertyController@destroy')->name('propertys.destory');
	Route::get('favourites','FavouriteController@index')->name('favourite.index');
	Route::get('profile/settings','ProfileController@index')->name('profile.settings');
	Route::post('profile/settings','ProfileController@update')->name('profile.settings.update');
	Route::get('package','PackageController@index')->name('package.index');
	Route::resource('agency','AgencyController');
	Route::post('invite_now/{id}','AgencyController@invite_now')->name('invite_now');
	Route::get('remove_agent/{user_id}/{category_id}','AgencyController@remove_agent');
	Route::get('agencys/remove/{id}','AgencyController@destroy')->name('agencys.remove');
	Route::get('agencys/leave/{id}','AgencyController@leave')->name('agencys.leave');
	Route::get('package/purchase/{id}','PackageController@purchase_page')->name('package.purchase_page');
	Route::get('payment-success', 'PaymentController@payment_success')->name('payment.success');
	Route::get('payment-fail', 'PaymentController@payment_fail')->name('payment.fail');
	Route::put('package/make-payment/{id}','PaymentController@index')->name('make_payment');
	Route::get('select/payment','PackageController@payment');
	Route::get('transaction','TransactionController@transaction')->name('transaction');
	Route::resource('review','ReviewController');
	Route::get('logout','DashboardController@logout')->name('logout');

});

/*
|--------------------------------------------------------------------------
| Themes Route
|--------------------------------------------------------------------------
|
| All Themes route are here
|
*/

Route::group(['namespace'=>'Amcoders\Theme\jomidar\http\controllers\Admin','middleware'=>['web','auth','admin'],'prefix'=>'admin', 'as'=>'admin.'],function(){

	Route::get('theme-option','ThemeoptionController@index')->name('theme.option');
	Route::post('theme-option','ThemeoptionController@update')->name('theme.option');

});

/*
|--------------------------------------------------------------------------
| Social Login Route
|--------------------------------------------------------------------------
|
| All Social login route are here
|
*/
Route::group(['namespace'=>'App\Http\Controllers\Auth','middleware'=>'web'],function(){

	Route::get('login/{provider}', 'LoginController@redirectToProvider');
	Route::get('login/{provider}/callback', 'LoginController@handleProviderCallback');

});
