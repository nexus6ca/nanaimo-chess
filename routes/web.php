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

Auth::routes();

/* Frontend Routes */
// VIEW Routes

// GET Routes
Route::get('/', 'FrontendController@home');

/* Backend Routes */
// VIEW Routes
Route::view('/backend/page/add', 'backend.page.add');
Route::view('/backend/home', 'backend.home');

Route::get('/backend/page/edit/', 'BackendController@editPage');
Route::get('/backend/page/edit/{id}', 'BackendController@editPage');

// AJAX Routes
Route::get('/backend/ajax/site', 'BackendController@getSiteSettings');
Route::get('/backend/ajax/pages', 'BackendController@getPages');
Route::get('/backend/ajax/page/{id}', 'BackendController@getPage');

// POST Routes
Route::post('/backend/site_settings', 'BackendController@saveSiteSettings');
Route::post('/backend/add-page', 'BackendController@addPage');
Route::post('/backend/edit-page/{id}', 'BackendController@editPage');
Route::post('/backend/deletePage/{id}', 'BackendController@deletePage');
