<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Auth\AdminLoginController;

use App\Http\Controllers\Web\BuyersController;
use App\Http\Controllers\Web\SellersController;
use App\Http\Controllers\Web\WebController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AmenitiesController;
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

// Website Routes Start

// Buyer Register & Signup Routes Start
Route::get('/buyer-signup',[BuyersController::class,'buyerSignup'])->name('buyer.signup');

Route::post('/buyer-register',[BuyersController::class,'buyerRegister'])->name('buyer.register');

Route::get('/forgot-password', function () {
    return view('buyer.forgot-password');
});

Route::post('/send-otp',[BuyersController::class,'sendOTP'])->name('send.otp');

Route::post('/resend-otp',[BuyersController::class,'sendOTP'])->name('resend.otp');

Route::get('/verify-otp', function () {
    return view('buyer.verify');
});

Route::post('/save-verify-otp',[BuyersController::class,'saveVerifyOTP'])->name('verify.otp');

Route::get('/verification-success', function () {
    return view('buyer.verification-success');
});

Route::get('/location', function () {
    return view('buyer.location');
});

Route::post('/save-location',[BuyersController::class,'saveLocation'])->name('save.location');

Route::get('/reset-password', function () {
    return view('buyer.reset-password');
});

Route::post('/set-password',[BuyersController::class,'setPassword'])->name('set.password');

Route::get('/reset-success', function () {
    return view('buyer.reset-success');
});

Route::get('/web-logout',function() {

    auth()->guard('buyer')->logout();
    return redirect()->to('/');
});
// Buyer Register & Signup Routes End

// Seller Register & Signup Routes Start
Route::get('/seller-signup',[SellersController::class,'sellerSignup'])->name('seller.signup');

Route::post('/seller-register',[SellersController::class,'sellerRegister'])->name('seller.register');

Route::get('/seller/forgot-password', function () {
    return view('seller.forgot-password');
});

Route::post('/seller/send-otp',[SellersController::class,'sendOTP'])->name('seller.sendotp');

Route::post('/seller/resend-otp',[SellersController::class,'sendOTP'])->name('seller.resendotp');

Route::get('/seller/verify-otp', function () {
    return view('seller.verify');
});

Route::post('/seller/save-verify-otp',[SellersController::class,'saveVerifyOTP'])->name('seller.verifyotp');

Route::get('/seller/verification-success', function () {
    return view('seller.verification-success');
});

Route::get('/seller/location', function () {
    return view('seller.location');
});

Route::post('/seller-save-location',[SellersController::class,'saveSellerLocation'])->name('saveseller.location');

Route::get('/seller/reset-password', function () {
    return view('seller.reset-password');
});

Route::post('/seller/set-password',[SellersController::class,'setPassword'])->name('seller.setpassword');

Route::get('/seller/reset-success', function () {
    return view('seller.reset-success');
});

Route::get('/seller-logout',function() {

    auth()->guard('seller')->logout();
    return redirect()->to('/');
});
// Seller Register & Signup Routes End

// Buyer Side After Login Routes Start
Route::group(['middleware' => 'PreventBackHistory'], function () {

    //Home page
    Route::any('/',[WebController::class,'index'])->name('web.index');

    // CMS Pages
    Route::get('/about-us',[WebController::class,'aboutUs'])->name('about.us');

    Route::get('/contact-us',[WebController::class,'contactUs'])->name('contact.us');

    Route::get('/faq-list',[WebController::class,'faqList'])->name('faq.list');

    Route::get('/privacy-policy',[WebController::class,'privacyPolicy'])->name('privacy.policy');

    Route::get('/terms-condition',[WebController::class,'termsCondition'])->name('terms.condition');

    // Category wise Storage List
    Route::get('/storage-list/{slug}',[WebController::class,'getStorageListByType'])->name('storagelist.bytype');

    // Get Amenities by Category in filter modal
    Route::get('/get/amenities/{category_id}',[WebController::class,'getAmenitiesByCategoryID'])->name('get.amenities');

    // Buyer Social Login Routes
    Route::get('/buyer-google-login',[BuyersController::class,'buyerGoogleLogin']);

    Route::get('/buyer-facebook-login',[BuyersController::class,'buyerFacebookLogin']);

    Route::get('/login', function () {

        if (auth()->guard('buyer')->user() == '') {

            $user = 'buyer';
            return view('buyer.login',compact('user'));
        }
        else {
            return redirect('/');
        }
    });
    Route::post('/buyer-login',[BuyersController::class,'buyerLogin'])->name('buyer.login');
    // Buyer Social Login Routes End

    // Seller Social Login Routes Start
    Route::get('/seller-google-login',[SellersController::class,'sellerGoogleLogin']);

    Route::get('/seller-facebook-login',[SellersController::class,'sellerFacebookLogin']);

    Route::get('seller/login', function () {

        if (auth()->guard('seller')->user() == '') {
            
            $user = 'seller';
            return view('seller.login',compact('user'));
        }
        else {
            return redirect('/');
        }
    });
    Route::post('/seller-login',[SellersController::class,'sellerLogin'])->name('seller.login');
    // Seller Social Login Routes Start

    // Common Routes For Social Login
    Route::get('/login/google', [WebController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('/login/google/callback', [WebController::class, 'handleGoogleCallback']);

    Route::get('/login/facebook', [WebController::class, 'redirectToFacebook'])->name('login.facebook');
    Route::get('/login/facebook/callback', [WebController::class, 'handleFacebookCallback']);
});
// Buyer Side After Login Routes End

// Website Routes End

// Admin Panel Routes Start
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

        // Amenities
        Route::get('amenities',[AmenitiesController::class,'index'])->name('admin.amenities');
        Route::get('add-amenities',[AmenitiesController::class,'addUpdateAmenities'])->name('admin.addamenities');
        Route::post('add-edit-amenities',[AmenitiesController::class,'saveAmenities'])->name('admin.saveamenities');
        Route::get('edit-amenities/{id}',[AmenitiesController::class,'addUpdateAmenities'])->name('admin.updateamenities');
        Route::get('delete-amenities/{id}',[AmenitiesController::class,'deleteAmenities'])->name('admin.deleteamenities');

        // Countries
        Route::get('/country',[CountryController::class,'getCountries'])->name('get.countries');
        Route::get('edit-country/{id}',[CountryController::class,'editCountry'])->name('admin.editcountry');
        Route::post('update-country/{id}',[CountryController::class,'updateCountry'])->name('admin.updatecountry');

        // Sellers
        Route::get('/sellers',[AdminController::class,'getSellers'])->name('get.sellers');
        Route::get('update/sellerstatus',[AdminController::class,'updateSellerStatus'])->name('update.sellerstatus');

        // Storages
        Route::get('/storages',[AdminController::class,'getStorages'])->name('get.storages');
        Route::get('storage-detail/{slug}',[AdminController::class,'getStorageDetailsByID'])->name('get.storagedetails');

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
        Route::get('view-featured-plan/{id}',[FeaturedPlanController::class,'viewFeaturedPlan'])->name('admin.viewfeaturedplan');

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

// Admin Panel Routes End