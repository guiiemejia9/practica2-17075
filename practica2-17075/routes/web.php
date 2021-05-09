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

Route::get('/', function () {
    return view('welcome');
});

Route::patch('/edits/{id}','StudentController@edit')->name('edits');
//formulario estudiante para editar
Route::get('/editforms/{id}','StudentController@editform')->name('editforms');
//eliminar estudiante
Route::delete('/deletes/{id}','StudentController@delete')->name('deletes');
//listar estudiante
Route::get('/lists','StudentController@list');
//formulario estudiante
Route::get('/forms', 'StudentController@studentform');
//guardar estudiante
Route::post('/saves', 'StudentController@save')->name('saves');
