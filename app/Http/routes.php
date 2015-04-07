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

Route::any('listings', 'PagesController@listings');

Route::post('confirm', 'PagesController@postconfirm');

Route::post('search_mls', 'PagesController@postsearch_mls');

Route::post('search_add', 'PagesController@postsearch_add');

Route::get('submit', 'PagesController@submit');

Route::post('submit', 'EmailController@submitProperty');

Route::any('toursummary', 'PagesController@tourSummary');

Route::any('map', 'PagesController@map');