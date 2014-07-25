<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/',array('as'=>'home_page','uses'=>'HomeController@index'));
Route::post('login','HomeController@login');
Route::get('logout',array('as'=>'user_logout','uses'=>'UserController@logout'));
Route::get('users/panel',array('as'=>'user_panel','uses'=>'UserController@panel'));
Route::get('users/newadmin',array('as'=>'new_admin','uses'=>'UserController@new_admin'));
Route::post('users/storeadmin','UserController@storeadmin');
Route::get('users/problems',array('as'=>'user_problems','uses'=>'UserController@problem'));
Route::resource('competitions','CompetitionController');
Route::resource('problems','ProblemController');
Route::resource('users','UserController');
