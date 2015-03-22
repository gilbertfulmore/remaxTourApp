<?php
Route::get('login', 'AuthenticationController@login');

Route::post('login', 'AuthenticationController@auth');

Route::get('logout', 'AuthenticationController@logout');

Route::get('admin', 'AdminController@admin');

Route::get('admin/agents', 'AdminController@agents');

Route::get('admin/register', 'AdminController@register');

Route::post('admin/register', 'AdminController@postregister');

Route::get('/', 'PagesController@index');

Route::get('home', 'PagesController@index');

Route::get('shadow', 'PagesController@shadow');

Route::get('help', 'PagesController@help');

Route::get('tours', 'PagesController@tours');

Route::get('map', 'PagesController@map');