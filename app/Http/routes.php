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

Route::get('mylistings', 'PagesController@mylistings');

Route::post('viewlisting', 'PagesController@postmylistings');

Route::post('confirm', 'PagesController@postconfirm');

Route::get('search', 'PagesController@search');

Route::post('search_mls', 'PagesController@postsearch_mls');

Route::post('search_add', 'PagesController@postsearch_add');

Route::get('viewlisting', 'PagesController@viewlisting');

Route::post('editlisting', 'PagesController@posteditlisting');

Route::get('submitproperty', 'PagesController@submitproperty');

Route::get('submit', 'PagesController@submit');

Route::post('submit', 'PagesController@postsubmit');
