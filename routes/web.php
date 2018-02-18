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

Route::get('/', 'PagesController@index')->name('home');
Route::get('/ueber-uns', 'PagesController@about')->name('about');
Route::get('/projekte', 'PagesController@projects')->name('projects');
Route::get('/blog', 'NewsController@overview')->name('news');
Route::get('/kontakt', 'PagesController@contact')->name('contact');
Route::get('/admin', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->middleware('auth');

Auth::routes();

Route::prefix('admin')->group(function () {

  Route::get('/', 'PagesController@index')->name('dashboard')->middleware('auth');
  Route::get('/news/new', 'NewsController@create')->middleware('auth');
  Route::post('/news/new', 'NewsController@save')->middleware('auth');
  Route::get('/news', 'NewsController@show')->middleware('auth');
  Route::get('/news/edit/{id}', 'NewsController@edit')->middleware('auth');
  Route::post('/news/edit/{id}', 'NewsController@update')->middleware('auth');
  Route::get('/category/new', 'CategoryController@create')->middleware('auth');
  Route::post('/category/new', 'CategoryController@save')->middleware('auth');

});

Route::get('/', 'NewsController@overview');
Route::get('news/{id}', 'NewsController@view')->name('news');
