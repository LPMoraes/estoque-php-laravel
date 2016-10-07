<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get("/produtos", "ProdutoController@lista")->name('listagem');

Route::get("/produtos/mostra/{id}","ProdutoController@mostra")->where('id', '[0-9]+');

Route::get("/produtos/novo", "ProdutoController@novo")->name('novo');

Route::post("/produtos/adiciona", "ProdutoController@adiciona");

Route::get("/produtos/json", "ProdutoController@listaJson");

Route::get("/produtos/remove/{id}", "ProdutoController@remove");

Route::get("/produtos/altera/{id}", "ProdutoController@altera")->name('altera');

Route::post("/produtos/modifica/{id}", "ProdutoController@modifica");

Route::get('home', 'HomeController@index')->middleware('auth');

Auth::routes();


//Route::get('/login', 'LoginController@login');

//Route::get('/home', 'HomeController@index');
