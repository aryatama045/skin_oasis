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

Route::middleware('auth:api')->get('/chat', function (Request $request) {
    return $request->user();
});


Route::get('/rooms', 'FcmController@getRooms');
Route::post('/get-room', 'FcmController@getRoom');
Route::post('/check-room', 'FcmController@checkRoom');
Route::post('/save-room', 'FcmController@saveRoom');
