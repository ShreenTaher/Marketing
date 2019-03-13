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

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('admincp/login'        , 'Admincp\AuthController@showLoginForm');
Route::post('admincp/login'       ,'Admincp\AuthController@login')->name('login');


//Route::group(['prefix' => 'admincp', 'middleware' => 'admin'], function () {
    Route::group(['prefix' => 'admincp'], function () {

    Route::get('logout'            ,'Admincp\Auth\LoginController@logout')->name('admincp.logout');

    Route::resource('/countries', 'Admincp\CountriesController');
    Route::resource('/cities', 'Admincp\CitiesController');
    Route::resource('/regions', 'Admincp\RegionsController');
    Route::resource('/currencies', 'Admincp\CurrenciesController');

    Route::get('/positions'        , 'Admincp\PositionsController@index');
    Route::get('/payment-methods'  , 'Admincp\PaymentMethodsController@index');
    Route::get('/business-types'   , 'Admincp\BusinessTypesController@index');
    
    Route::post('logout'           , 'AuthController@logout');
});
