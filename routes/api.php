<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\DriverController;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::prefix('user')->group(function () {

    // Basic APIs
    Route::post('login', [UserController::class, 'login']);
    Route::post('social-login', [UserController::class, 'socialLogin']);
    Route::post('verify-otp',[UserController::class,'verifyOTP']);
    Route::post('resend-otp',[UserController::class,'resendOTP']);
    Route::post('edit-user-profile', [UserController::class, 'editUserProfile']);
    Route::post('get-user-details', [UserController::class, 'getUserDetails']);
});

Route::prefix('driver')->group(function () {

    // Basic APIs
    Route::post('login', [DriverController::class, 'login']);
    Route::post('social-login', [DriverController::class, 'socialLogin']);
    Route::post('verify-otp',[DriverController::class,'verifyOTP']);
    Route::post('resend-otp',[DriverController::class,'resendOTP']);
    Route::post('edit-driver-profile', [DriverController::class, 'editDriverProfile']);
    Route::post('get-driver-details', [DriverController::class, 'getDriverDetails']);
});