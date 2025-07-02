<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/add-memory', function () {
    return 'Add Memory Page';
})->name('add-memory');

Route::get('/view-map', function () {
    return 'View Map Page';
})->name('view-map');

Route::get('/login', function () {
    return 'login';
})->name('login');

Route::get('/register', function () {
    return 'register';
})->name('register');

Route::get('/password.request', function () {
    return 'password.request';
})->name('password.request');