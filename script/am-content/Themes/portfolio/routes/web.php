<?php 


Route::group(['namespace'=>'Amcoders\Theme\portfolio\http\controllers','middleware'=>'web'],function(){

	Route::get('/','WelcomeController@index')->name('welcome');
	Route::post('contact','WelcomeController@contact')->name('contact');

});

Route::group(['namespace'=>'Amcoders\Theme\portfolio\http\controllers','middleware'=>['web','auth','admin'],'prefix'=>'admin/', 'as'=>'admin.'],function(){

	Route::resource('theme-option','WelcomeController');
});	