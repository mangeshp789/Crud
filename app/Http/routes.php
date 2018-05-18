<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/display',function(){
	return view("display");
});
Route::get('/create',function(){
	return view('create');
});
Route::post('/create',"HomeController@create");
Route::get('/view/{id}',function($id){
	return view('update',["id"=>$id]);
});
Route::post('/edit/{id}',"HomeController@update");
Route::get('/delete/{id}',"HomeController@delete");