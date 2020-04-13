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
    return view('index');
});

Route::group(['prefix'=>'solicitudes'], function(){

    Route::get('request',array(
        'as'=>'asociate',
        'uses'=>'SolicitudesController@create'
    ));     

    Route::post('create',array(
        'as'=>'asociatecreate',
        'uses'=>'SolicitudesController@store'
    ));
    
    Route::get('validar',array(
        'as'=>'vervalidacion',
        'uses'=>'SolicitudesController@vervalidacion'
    ));
    
    Route::post('validar-status',array(
        'as'=>'validar',
        'uses'=>'SolicitudesController@statusvalidacion'
    ));
    

});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
