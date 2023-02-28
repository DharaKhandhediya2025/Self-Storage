<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Auth\AdminLoginController;

use App\Http\Controllers\Web\BuyersController;
use App\Http\Controllers\Web\SellersController;
use App\Http\Controllers\Web\WebController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\BannersController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\FeaturedPlanController;
use App\Http\Controllers\Admin\TermsConditionController;
use App\Http\Controllers\Admin\PrivacyPolicyController;

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

        // Banners
        Route::get('banners',[BannersController::class,'index'])->name('admin.banners');
        Route::get('add-banners',[BannersController::class,'addUpdateBanner'])->name('admin.addbanners');
        Route::post('add-edit-banners',[BannersController::class,'saveBanner'])->name('admin.savebanners');
        Route::get('edit-banners/{id}',[BannersController::class,'addUpdateBanner'])->name('admin.updatebanners');
        Route::get('delete-banners/{id}',[BannersController::class,'deleteBanner'])->name('admin.deletebanners');

        // Category
        Route::get('category',[CategoryController::class,'index'])->name('admin.category');
        Route::get('add-category',[CategoryController::class,'addUpdateCategory'])->name('admin.addcategory');
        Route::post('add-edit-category',[CategoryController::class,'saveCategory'])->name('admin.savecategory');
        Route::get('edit-category/{id}',[CategoryController::class,'addUpdateCategory'])->name('admin.updatecategory');
        Route::get('delete-category/{id}',[CategoryController::class,'deleteCategory'])->name('admin.deletecategory');

        // Countries
        Route::get('/country',[CountryController::class,'getCountries'])->name('get.countries');
        Route::get('edit-country/{id}',[CountryController::class,'editCountry'])->name('admin.editcountry');
        Route::post('update-country/{id}',[CountryController::class,'updateCountry'])->name('admin.updatecountry');

        // Sellers
        Route::get('/sellers',[AdminController::class,'getSellers'])->name('get.sellers');
        Route::get('update/sellerstatus',[AdminController::class,'updateSellerStatus'])->name('update.sellerstatus');

        // Storages
        Route::get('/storages',[AdminController::class,'getStorages'])->name('get.storages');

        // Buyers
        Route::get('/buyers',[AdminController::class,'getBuyers'])->name('get.buyers');
        Route::get('update/buyerstatus',[AdminController::class,'updateBuyerStatus'])->name('update.buyerstatus');

        // Inquiry
        Route::get('/inquiry',[AdminController::class,'getBuyerInquires'])->name('get.buyerinquiries');

        // Featured Plans
        Route::get('featured-plan',[FeaturedPlanController::class,'index'])->name('admin.featuredplan');
        Route::get('add-featured-plan',[FeaturedPlanController::class,'addUpdateFeaturedPlan'])->name('admin.addfeaturedplan');
        Route::post('add-edit-featured-plan',[FeaturedPlanController::class,'saveFeaturedPlan'])->name('admin.savefeaturedplan');
        Route::get('edit-featured-plan/{id}',[FeaturedPlanController::class,'addUpdateFeaturedPlan'])->name('admin.updatefeaturedplan');
        Route::get('delete-featured-plan/{id}',[FeaturedPlanController::class,'deleteFeaturedPlan'])->name('admin.deletefeaturedplan');

        // CMS Pages

        // FAQs
        Route::get('faq-list',[FAQController::class,'index'])->name('admin.faq');
        Route::get('add-faq',[FAQController::class,'addUpdateFaq'])->name('admin.addfaq');
        Route::post('add-edit-faq',[FAQController::class,'saveFaq'])->name('admin.savefaq');
        Route::get('edit-faq/{id}',[FAQController::class,'addUpdateFaq'])->name('admin.updatefaq');
        Route::get('delete-faq/{id}',[FAQController::class,'deleteFaq'])->name('admin.deletefaq');
        Route::get('view-faq/{id}',[FAQController::class,'viewFaq'])->name('admin.viewfaq');

        // Terms & Condition
        Route::get('terms-condition', [TermsConditionController::class, 'index'])->name('admin.terms');
        Route::post('add-terms-condition', [TermsConditionController::class, 'addUpdate'])->name('admin.termsadd');

        // Privacy Policy
        Route::get('privacy-policy', [PrivacyPolicyController::class, 'index'])->name('admin.privacy');
        Route::post('add-privacy-policy', [PrivacyPolicyController::class, 'addUpdate'])->name('admin.privacyadd');

        // About Us
        Route::get('about-us', [AboutUsController::class, 'index'])->name('admin.aboutus');
        Route::post('add-about-us', [AboutUsController::class, 'addUpdate'])->name('admin.aboutusadd');

        // Contact Us
        Route::get('contact-us', [ContactUsController::class, 'index'])->name('admin.contactus');
        Route::post('add-contact-us', [ContactUsController::class, 'addUpdate'])->name('admin.contactusadd');
    });        
});