<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\AdminController;

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

Route::group(['middleware' => 'preventbackhistory'], function () {

    Route::group(['prefix'=>'admin','namespace'=>'Auth'], function () {

        Route::get('/', [AdminController::class,'showLoginForm']);
        Route::get('login', [AdminController::class,'showLoginForm']);
        Route::post('login', [AdminController::class,'login']);
        Route::get('logout', [AdminController::class,'logout'])->middleware('isAuthenticate:admin');
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