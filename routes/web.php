<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get("jukebox/jukebox", "JukeboxController@create");
Route::post("jukebox/jukebox", "JukeboxController@store");  
Route::get("jukebox/edit", "JukeboxController@edit");
Route::post("jukebox/html_wrapper", "JukeboxController@edit");
