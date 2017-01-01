<?php


Route::resource('api/tasks', 'TasksController');
Route::get('/', function(){
	return view('pages.home');
});