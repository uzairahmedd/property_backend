<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PropertyController;
use App\Http\Controllers\Api\RegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/list', [PropertyController::class, 'store']);
});

Route::get('/categories', [PropertyController::class, 'categories']);
Route::get('/listings', [PropertyController::class, 'listings']);
Route::get('/listing/{slug}', [PropertyController::class, 'listing']);
Route::post('/send_otp', [RegisterController::class, 'send_otp']);
Route::post('/verify_otp', [RegisterController::class, 'verify_otp']);
Route::post('/user_register', [RegisterController::class, 'user_register']);