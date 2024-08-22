<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

//Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']);
//Route::get('/user/{user}', [\App\Http\Controllers\UserController::class, 'show'])->where('user', '[0-9]+');
//Route::post('/user', [\App\Http\Controllers\UserController::class, 'store']);
//Route::put('/user/{user}', [\App\Http\Controllers\UserController::class, 'update']);
//Route::delete('/user/{user}', [\App\Http\Controllers\UserController::class, 'destroy']);
//Route::middleware('auth')->group(function () {
//    Route::apiResource('users', \App\Http\Controllers\UserController::class);
//});
Route::group([

   'name'=>'users.',
], function () {
 Route::apiResource('users', \App\Http\Controllers\UserController::class);
});
