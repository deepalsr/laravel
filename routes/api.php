<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('hello', function (Request $request) {
    return 'text hello';
});

Route::post('hello', function (Request $request) {
    return 'post hello';
});

Route::post('/login',[AuthController::class,'login']);

Route::post('/register',[AuthController::class,'register']);