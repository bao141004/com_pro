<?php
use App\Http\Controllers\Api\ApiPostController;
use App\Http\Controllers\Api\ApiUserController;
use Illuminate\Support\Facades\Route;

Route::apiResource('post',ApiPostController::class);
Route::apiResource('user',ApiUserController::class);
?>