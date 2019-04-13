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

/**
* User actions.
*/
Route::get('/', 'UserController@users')->name('users');
Route::get('/user/info/{uid}', 'UserController@usersInfo')->name('user.info');

/**
* Addressbook actions.
*/
Route::get('/addressbook', 'AddressbookController@index')->name('addressbook');