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

	Route::get('/service/{name}', ['uses'=>'PagesController@service', 'as'=>'service']);
	Route::get('/blog/{name}', ['uses'=>'PagesController@blog', 'as'=>'blog']);
	Route::get('/tour/{name}', ['uses'=>'PagesController@tour', 'as'=>'tour']);

	Route::post('/message', 'Message\MessageController@send_form');
	
	Route::auth();
});



//admin
Route::group(['prefix'=>'admin','middleware'=>'auth'], function() {

	Route::get('/home', ['uses'=>'Admin\HomeController@index', 'as'=>'home']);
	
	Route::group(['prefix'=>'services'], function() {
		Route::match(['get','post'], '/add', ['uses'=>'Admin\ServicesController@create','as'=>'serviceAdd']);
		Route::match(['get','post'], '/edit/{service}', ['uses'=>'Admin\ServicesController@edit','as'=>'serviceEdit']);
		Route::match(['get', 'post', 'delete'], '/delete/{service}', ['uses'=>'Admin\ServicesController@destroy','as'=>'serviceDestroy']);
	});
	
	Route::group(['prefix'=>'tour'], function() {
		Route::match(['get','post'], '/add', ['uses'=>'Admin\ToursController@create','as'=>'tourAdd']);
		Route::match(['get','post'], '/edit/{tour}', ['uses'=>'Admin\ToursController@edit','as'=>'tourEdit']);
		Route::match(['get', 'post', 'delete'], '/delete/{tour}', ['uses'=>'Admin\ToursController@destroy','as'=>'tourDestroy']);
	});
	
	Route::group(['prefix'=>'blog'], function() {
		Route::match(['get','post'], '/add', ['uses'=>'Admin\BlogsController@create','as'=>'blogAdd']);
		Route::match(['get','post'], '/edit/{blog}', ['uses'=>'Admin\BlogsController@edit','as'=>'blogEdit']);
		Route::match(['get', 'post', 'delete'], '/delete/{blog}', ['uses'=>'Admin\BlogsController@destroy','as'=>'blogDestroy']);
	});
	
	Route::group(['prefix'=>'gallery'], function() {
		Route::match(['get','post'], '/add', ['uses'=>'Admin\GalleriesController@create','as'=>'galleryAdd']);
		Route::match(['get','post'], '/edit/{gallery}', ['uses'=>'Admin\GalleriesController@edit','as'=>'galleryEdit']);
		Route::match(['get', 'post', 'delete'], '/delete/{gallery}', ['uses'=>'Admin\GalleriesController@destroy','as'=>'galleryDestroy']);
	});
	
	Route::group(['prefix'=>'article_gallery'], function() {
		Route::match(['get','post'], '/add', ['uses'=>'Admin\ArticleGalleriesController@create','as'=>'article_galleryAdd']);
		Route::match(['get','post'], '/edit/{article_gallery}', ['uses'=>'Admin\ArticleGalleriesController@edit','as'=>'article_galleryEdit']);
		Route::match(['get', 'post', 'delete'], '/delete/{article_gallery}', ['uses'=>'Admin\ArticleGalleriesController@destroy','as'=>'article_galleryDestroy']);
	});


	Route::group(['prefix'=>'about_us'], function() {
		Route::match(['get','post'], '/edit/{about}', ['uses'=>'Admin\AboutController@edit','as'=>'aboutEdit']);
	});

});
