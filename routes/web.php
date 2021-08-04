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

//Route::get('/', function () { return view('pages.home'); });

Route::get('/', 'CategoryController@tipo_obra');
Route::post('/', 'CategoryController@Posttipo_obra');
Route::get('/autores', 'CategoryController@autores');
Route::post('/autores', 'CategoryController@Postautores');
Route::get('/dados_obra', 'CategoryController@dados_obra');
Route::post('/dados_obra', 'CategoryController@Postdados_obra');
Route::get('/meio_publicacao', 'CategoryController@meio_publicacao');
Route::post('/meio_publicacao', 'CategoryController@Postmeio_publicacao');
Route::get('/referencia', 'CategoryController@referencia');