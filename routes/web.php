<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('laravel', function () {
    return view('welcome-to-laravel');
});

Route::group(['middleware'=>'web'], function() {
    
    Route::match(['get','post'], '/', ['uses'=>'MainController@welcome', 'as'=>'welcome']);
    Route::post('/page/', ['uses'=>'MainController@page', 'as'=>'page']);
    Route::get('/page/{alias}', ['uses'=>'MainController@page_display', 'as'=>'page_display']);
    Route::post('/control/page', ['uses'=>'MainController@page_control', 'as'=>'page_control']);
    Route::auth();
    
});

Route::group(['middleware'=>'auth'], function() {
   
    Route::match(['get','post'], '/add/page', ['uses'=>'MainController@record_add_up', 'as'=>'recordAdd']);
    Route::match(['get','post','delete'], '/edit/page/{alias}', ['uses'=>'MainController@record_edit', 'as'=>'recordEdit']);

});
Auth::routes();

Route::get('/home', 'HomeController@index');
