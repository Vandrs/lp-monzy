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

#Auth Routes

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/', 'SiteController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/api/leads','LeadController@create')->name('lead.create');
Route::get('/api/leads','LeadController@datatables')->name('lead.list');
Route::delete('/api/leads/{id}','LeadController@delete')->name('lead.delete');