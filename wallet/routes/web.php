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

Route::get('/', array('uses' => 'Wallet@index'));
Route::post('/dashboard', array('uses' => 'Wallet@dashboard'));
Route::post('/receive', array('uses' => 'Wallet@receive'));
Route::post('/send', array('uses' => 'Wallet@send'));
Route::post('/transactions', array('uses' => 'Wallet@transactions'));
Route::post('/addresses', array('uses' => 'Wallet@addresses'));
Route::post('/masternodes', array('uses' => 'Wallet@masternodes'));
