<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/teste','\App\Http\Controllers\Api\UsuarioController@status');

Route::namespace('Api')->group(function () {

    Route::post('/usuario/create', '\App\Http\Controllers\Api\UsuarioController@create');

    Route::get('/usuarios/read', '\App\Http\Controllers\Api\UsuarioController@read');
    Route::get('/usuario/select/{id}', '\App\Http\Controllers\Api\UsuarioController@select');

    Route::put('/usuario/update/{id}', '\App\Http\Controllers\Api\UsuarioController@update');

    Route::delete('/usuario/delete/{id}', '\App\Http\Controllers\Api\UsuarioController@delete');
});