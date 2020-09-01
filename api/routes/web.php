<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/phpinfo', function () {
    phpinfo();
});

Route::get('/login', 'Auth\LoginController@login');

Auth::routes();

Route::resource('characters', 'CharacterController')->middleware('auth');
Route::resource('houses', 'HouseController')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/csrf_token', function (){
    var_export(csrf_token());
});

Route::get('api/v1/house_potterapi_id/{potterapi_id}', 'HouseController@varify_house_by_potterapi_id');
Route::get('api/v1/character_potterapi_id/{potterapi_id}', 'CharacterController@varify_character_by_potterapi_id');
