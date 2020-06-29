<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/adduser', 'UsersController@store');

Route::post('/getusers', 'UsersController@userget');
