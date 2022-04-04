<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('LocalizationApi')
    ->namespace('Khaleds\LaravelProduct\Http\Controllers\Api')
    ->prefix('/api')
    ->group(function (){

    Route::prefix('/category')
        // ad it in route provider
        ->group(function () {
            //check for resource
            Route::get('/all', 'CategoryController@index');
            Route::post('/store', 'CategoryController@store');
            Route::post('/update', 'CategoryController@update');
            Route::post('/destroy', 'CategoryController@destroy');
        });

        Route::prefix('/product')
            // ad it in route provider
            ->group(function () {
                Route::get('/all', 'ProductController@index');
                Route::post('/store', 'ProductController@store');
                Route::post('/update', 'ProductController@update');
                Route::post('/show','ProductController@show');
                Route::post('/destroy','ProductController@destroy');
            });

        Route::prefix('/option')
            // ad it in route provider
            ->group(function () {
                Route::get('/all', 'OptionController@index');
                Route::post('/store', 'OptionController@store');
                Route::post('/update', 'OptionController@update');
                Route::post('/show','OptionController@show');
                Route::post('/destroy','OptionController@destroy');
            });

        Route::prefix('/option-value')
            // ad it in route provider
            ->group(function () {
                Route::get('/all', 'OptionValueController@index');
                Route::post('/store', 'OptionValueController@store');
                Route::post('/update', 'OptionValueController@update');
                Route::post('/show','OptionValueController@show');
                Route::post('/destroy','OptionValueController@destroy');
            });


    });

