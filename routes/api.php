<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/', function(Request $request){
    dd($request->user());
})->middleware('auth:api');

Route::get('/set', function(Request $request){
    dd($request->user());
});

Route::namespace('Api')->group(function () {
    Route::get('/todo/{date}', 'TodoController@list')
        ->where('date', '^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$')
        ->name('todo.list');
    Route::put('/todo/{todo}/check', 'TodoController@check')
        ->name('todo.check');
    Route::get('/todo/token', 'TodoController@token')
        ->name('todo.token');
    Route::resource('/todo', 'TodoController');
});
