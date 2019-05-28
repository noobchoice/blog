<?php

//Routes For Users
Route::group(['namespace'=>'User'], function(){

	Route::get('/',[

		'as'  => 'home',
		'uses'=> 'HomeController@index'

	]);

	Route::get('/post{slug}', [
		'as'  => 'postPage',
		'uses'=> 'PostController@post'

	]);
});



//Routes For Admin
Route::group(['namespace'=>'Admin'], function(){

	Route::get('admin/home','HomeController@index')->name('admin.home');
	
	//User Route
	Route::resource('admin/user','UserController');


	//Post Route
	Route::resource('admin/post','PostController');

	//Tag Route
	Route::resource('admin/tag','TagController');

	//Category Route
	Route::resource('admin/category','CategoryController');
});








