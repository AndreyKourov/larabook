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


Route::get('/', function () {
    return view('welcome');
});
*/
Route::resource('/', 'TopicController@index');


// Маршрутизация для RESTful контроллера. Указывает одной инструкцией
// и указываеть множество маршрутов не нужно.
// первым параметром указываем имя для маршрутизации 'topic'
// второй параметр это имя контроллера
Route::resource('topic', 'TopicController');
Route::resource('block', 'BlockController'); 

