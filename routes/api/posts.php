<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::group([
    'name'=>'posts.',
], function () {
    Route::apiResource('posts', \App\Http\Controllers\PostController::class);
});
//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');


