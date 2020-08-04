<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {return view('welcome');});
Route::get('/home', 'HomeController@index')->name('home');

// Route::group(['prefix' => 'authors'], function() {
//     Route::post('',                 'AuthorController@indexData');
//     Route::post('create',           'AuthorController@create');
//     Route::post('store',            'AuthorController@store');
//     Route::post('edit/{author}',    'AuthorController@edit');
//     Route::post('update/{author}',  'AuthorController@update');
//     Route::post('delete/{author}',  'AuthorController@destroy');
// });

// Route::group(['prefix' => 'books'], function() {
//     Route::post('',                 'BookController@indexData');
//     Route::post('create',           'BookController@create');
//     Route::post('store',            'BookController@store');
//     Route::post('edit/{author}',    'BookController@edit');
//     Route::post('update/{author}',  'BookController@update');
//     Route::post('delete/{author}',  'BookController@destroy');
// });

###

Route::group(['prefix' => 'restaurants'], function() {
    Route::get ('',                    'RestaurantController@index')   ->name('restaurant.index');
    Route::get ('create',              'RestaurantController@create')  ->name('restaurant.create');
    Route::post('store',               'RestaurantController@store')   ->name('restaurant.store');
    Route::get ('edit/{restaurant}',   'RestaurantController@edit')    ->name('restaurant.edit');
    Route::post('update/{restaurant}', 'RestaurantController@update')  ->name('restaurant.update');
    Route::post('delete/{restaurant}', 'RestaurantController@destroy') ->name('restaurant.destroy');
    // Route::get ('show/{restaurant}',   'RestaurantController@show')    ->name('restaurant.show');
});

Route::group(['prefix' => 'menus'], function() {
    Route::get ('',              'MenuController@index')   ->name('menu.index');
    Route::get ('create',        'MenuController@create')  ->name('menu.create');
    Route::post('store',         'MenuController@store')   ->name('menu.store');
    Route::get ('edit/{menu}',   'MenuController@edit')    ->name('menu.edit');
    Route::post('update/{menu}', 'MenuController@update')  ->name('menu.update');
    Route::post('delete/{menu}', 'MenuController@destroy') ->name('menu.destroy');
    // Route::get ('show/{menu}',   'MenuController@show')    ->name('menu.show');
});