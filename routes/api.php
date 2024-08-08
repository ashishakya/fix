<?php

use App\Http\Controllers\Backend\Auth\AuthController;
use App\Http\Controllers\Backend\Customer\CustomerController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, "login"]);

//Route::middleware('auth:sanctum')->group(function () {
Route::post('me', [AuthController::class, "me"]);
Route::apiResource("customers", CustomerController::class);
//});
