<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/playground', function () {
//    return (new App\Mail\WelcomeMail(\App\Models\User::query()->first()))->render();
//});
