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
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use Illuminate\Support\Facades\Route;

Route::get('/', 'PagesController@index' );

Route::resource('address', 'AddressController');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
