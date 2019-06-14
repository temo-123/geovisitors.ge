<?php

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

//user
Route::group(['middleware'=>'web'], function() {
	Route::match(['get','post'], '/', ['uses'=>'IndexController@execute', 'as'=>'index']);
	Route::get('/service/{name}', ['uses'=>'Page\ServiceController@execute', 'as'=>'service']);
	Route::get('/blog/{name}', ['uses'=>'Page\PortfolioController@execute', 'as'=>'blog']);
	Route::get('/tour/{name}', ['uses'=>'Page\PortfolioController@execute', 'as'=>'tour']);
	Route::auth();
});

//admin
Route::group(['prefix'=>'admin','middleware'=>'auth'], function() {

	Route::get('/home', ['uses'=>'Admin\HomeController@index', 'as'=>'home']);

	Route::group(['prefix'=>'pages'], function() {
		Route::match(['get','post'], '/add', ['uses'=>'Admin\Page\PagesAddController@execute','as'=>'pagesAdd']);
		Route::match(['get', 'post', 'delete'], '/edit/{page}', ['uses' => 'Admin\Page\PagesEditController@execute', 'as'=>'pagesEdit']);
	});
	
	Route::group(['prefix'=>'services'], function() {
		Route::match(['get','post'], '/add', ['uses'=>'Admin\Services\ServicesAddController@execute','as'=>'serviceAdd']);
		Route::match(['get', 'post', 'delete'], '/edit/{service}', ['uses' => 'Admin\Services\ServicesEditController@execute', 'as'=>'serviceEdit']);
	});

	Route::group(['prefix'=>'portfolios'], function() {
		Route::match(['get','post'], '/add', ['uses'=>'Admin\Portfolio\PortfoliosAddController@execute','as'=>'portfolioAdd']);
		Route::match(['get', 'post', 'delete'], '/edit/{portfolio}', ['uses' => 'Admin\Portfolio\PortfoliosEditController@execute', 'as'=>'portfolioEdit']);
	});
	
	Route::group(['prefix'=>'People'], function() {
		Route::match(['get','post'], '/add', ['uses'=>'Admin\Peoples\PeoplesAddController@execute','as'=>'PeoplesAdd']);
		Route::match(['get', 'post', 'delete'], '/edit/{peoples}', ['uses' => 'Admin\Peoples\PeoplesEditController@execute', 'as'=>'PeoplesEdit']);
	});

});
