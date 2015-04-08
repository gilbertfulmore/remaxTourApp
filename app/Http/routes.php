<?php
Route::get('login', 'AuthenticationController@login');

Route::post('login', 'AuthenticationController@auth');

Route::get('logout', 'AuthenticationController@logout');

Route::group(['prefix' => 'admin'], function() {

    Route::get('/', 'AdminController@admin');

    Route::get('agents', 'AdminController@agents');

    Route::get('register', 'AdminController@register');

    Route::post('register', 'EmailController@accountCreation');

    Route::any('edituser', 'AdminController@edituser');

    Route::any('edittours', 'AdminController@edittours');

    Route::any('removetour', 'AdminController@removetour');

    Route::any('email_settings', 'AdminController@email_settings');
});

Route::get('/', 'PagesController@index');

Route::get('home', 'PagesController@index');

Route::get('help', 'PagesController@help');

Route::get('tours', 'PagesController@tours');

Route::any('mylistings', 'PagesController@myListings');

Route::post('confirm', 'PagesController@postconfirm');

Route::post('search_mls', 'PagesController@postsearch_mls');

Route::post('search_add', 'PagesController@postsearch_add');

Route::get('submitproperty', 'PagesController@submitProperty');

Route::post('submitproperty', 'EmailController@submitProperty');

Route::any('toursummary', 'PagesController@tourSummary');

Route::any('map', 'PagesController@map');

Route::any('view_listing', 'PagesController@view_listing');

<<<<<<< HEAD
Route::any('edit_listing', 'PagesController@edit_listing');
=======
Route::any('edit_listing', 'PagesController@edit_listing');
>>>>>>> 2e42508fb0dbed7fc3f654b10b78856441ae02c9
