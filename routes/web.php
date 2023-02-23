<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Auth\AdminLoginController;

use App\Http\Controllers\Web\BuyersController;
use App\Http\Controllers\Web\SellersController;
use App\Http\Controllers\Web\WebController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\FeaturedPlanController;
use App\Http\Controllers\Admin\TermsConditionController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\ContactUsController;

use App\Models\FAQ;
use App\Models\TermsCondition;
use App\Models\PrivacyPolicy;
use App\Models\AboutUs;
use App\Models\ContactUs;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes(['login' => false]);

Route::group(['middleware' => 'PreventBackHistory'], function () {

    Route::group(['prefix'=>'admin','namespace'=>'Auth'], function () {

        Route::get('/', [AdminLoginController::class,'showLoginForm']);
        Route::get('login', [AdminLoginController::class,'showLoginForm']);
        Route::post('login', [AdminLoginController::class,'login']);
        Route::get('logout', [AdminLoginController::class,'logout'])->middleware('isAuthenticate:admin');

        Route::get('/forgot-password', function () {
            return view('admin.forgotPassword');
        });

        Route::post('/send-otp',[AdminLoginController::class,'sendOTP'])->name('admin.sendotp');

        Route::get('/verify-otp', function () {
            return view('admin.verifyOTP');
        });

        Route::post('/save-verify-otp',[AdminLoginController::class,'saveVerifyOTP'])->name('admin.verifyotp');

        Route::get('/reset-password', function () {
            return view('admin.reset-password');
        });

        Route::post('/set-password',[AdminLoginController::class,'setPassword'])->name('admin.setpassword');

        Route::get('/reset-success', function () {
            return view('admin.reset-success');
        });
    });

    Route::group(['middleware' => 'isAuthenticate:admin','prefix'=>'admin','namespace'=>'Admin'], function () {

        // Admin Dashboard
        Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');

        Route::get('dashboard/datewise',[AdminController::class,'dashboardDatewise'])->name('admindashboard.datewise');

        // Change Password
        Route::get('change-password',[AdminController::class,'changePassword'])->name('admin.changepassword');
        Route::post('change-password',[AdminController::class,'updatePassword'])->name('admin.updatepassword');
    });        
});