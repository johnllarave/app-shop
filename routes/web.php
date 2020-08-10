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

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/products', 'ProductController@index'); //listado de productos editar eliminar
	Route::get('/admin/products/create', 'ProductController@create'); //Crear productos //formulario de registro
	Route::post('/admin/products', 'ProductController@store'); //Crear productos //registrar información
	Route::get('/admin/products/{id}/edit', 'ProductController@edit'); //Editar productos //formulario de edición
	Route::post('/admin/products/{id}/edit', 'ProductController@update'); //Actualizar información
	//Route::get('/admin/products/{id}/delete', 'ProductController@destroy'); //Eliminar información metodo GET
	Route::post('/admin/products/{id}/delete', 'ProductController@destroy'); //Eliminar información metodo POST
});