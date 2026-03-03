<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Types\Relations\Role;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test', function () {
    return view('test');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/halo', function () {
    return "Hallo Laravel";
});

Route::redirect('/home', '/');

Route::fallback(function () {
    return "Page Not Found 404";
});
