<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
        Route::get("/usuario",'UserController@index')->name('user.index');
        Route::put('usuario-activate/{id_user}','UserController@activar')->name('user.activate');
        Route::put('usuario-desactivate/{id_user}','UserController@desactivar')->name('user.deactivate');


        Route::get("/articulo",'ArticleController@index')->name('article.index');
        Route::get("/articulo/create",'ArticleController@create')->name('article.create');
        Route::post("/articulo",'ArticleController@store')->name('admin.article.store');
        Route::get("/articulo/{id}",'ArticleController@edit')->name('article.edit');
        Route::put('/articulo-update/{id}','ArticleController@update')->name('article.update');
        Route::put('/articulo-activate/{id}','ArticleController@activar')->name('article.activate');
        Route::put('/articulo-desactivate/{id}','ArticleController@desactivar')->name('article.deactivate');
        Route::delete('/articulo-delete/{id}','ArticleController@delete')->name('article.delete');

    });
});
