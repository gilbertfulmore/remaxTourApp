<?php

Route::get('/', 'PagesController@index');

Route::get('home', 'PagesController@index');

Route::get('shadow', 'PagesController@shadow');

Route::get('login', 'AuthenticationController@login');

Route::post('login', 'AuthenticationController@auth');

Route::get('logout', 'AuthenticationController@logout');