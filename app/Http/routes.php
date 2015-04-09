<!-- This file is part of open-sourced software licensed under the MIT license -->

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
    
    Route::any('reorganize', 'AdminController@reorganize');
        
    Route::any('handlechange', 'AdminController@handlechange');
    
    Route::any('changetour', 'AdminController@changetour');
    
    Route::any('organize', 'AdminController@organize');
    
    Route::any('newtour', 'AdminController@newtour');
    
    Route::any('markremove', 'AdminController@markremove');

    Route::any('marksubmit', 'AdminController@marksubmit');
});

Route::get('/', 'PagesController@index');

Route::get('home', 'PagesController@index');

Route::get('help', 'PagesController@help');

Route::get('tours', 'PagesController@tours');

Route::any('mylistings', 'PagesController@listings');

Route::post('confirm', 'PagesController@postconfirm');

Route::post('search_mls', 'PagesController@postsearch_mls');

Route::post('search_add', 'PagesController@postsearch_add');

Route::get('submitproperty', 'PagesController@submitProperty');

Route::post('submitproperty', 'EmailController@submitProperty');

Route::any('submit', 'PagesController@submit');

Route::any('toursummary', 'PagesController@tourSummary');

Route::any('map', 'PagesController@map');

Route::any('view_listing', 'PagesController@view_listing');

Route::any('edit_listing', 'PagesController@edit_listing');
