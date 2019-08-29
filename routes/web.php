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

Route::get('/', 'SiteController@index');
Route::get('/index', 'SiteController@index');
Route::get('/inicio', 'SiteController@index');

Route::get('/cadastro', 'SiteController@cadastro');
Route::get('/criar', 'SiteController@criar');
Route::get('deletar/{id}', 'SiteController@destroy');
Route::get('editar/{id}', 'SiteController@editar');
Route::get('salvarEdicao', 'SiteController@update');