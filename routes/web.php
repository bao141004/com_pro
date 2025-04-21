<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('posts', PostController::class);
Route::get('store-posts',[PostController::class, 'StoreApi']);
Route::resource('users', UserController::class);
Route::get('store-users',[UserController::class, 'StoreUsersFromApi']);
