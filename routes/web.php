<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\AizUploadController;
use App\Http\Controllers\InstamojoController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\PropertyListingController;
use App\Http\Controllers\Frontend\Auth\LoginController;
use App\Http\Controllers\Frontend\Auth\RegisterController;

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
Route::get('/admin',function(){
    return redirect()->route('login');
});


Route::get('/', [HomeController::class, 'index'])->name('index');
Route::view('email','frontend.email.welcome');
//Register
Route::get('signup',[RegisterController::class,'register'])->name('signup');
Route::post('registration',[RegisterController::class,'registration'])->name('registartion');
Route::post('get-address',[RegisterController::class,'getAddress'])->name('get.address');

//Email
Route::view('welcome_mail','email.welcome_mail')->name('welcome_mail');
Route::view('active_mail','email.active_mail')->name('active_mail');
Route::view('passive_mail','email.passive_mail')->name('passive_mail');
Route::view('payout','email.payout')->name('payout');
//Login
Route::get('signin',[LoginController::class,'signin'])->name('signin');
Route::post('login',[LoginController::class,'login'])->name('login');

Route::view('forgot-password', 'frontend.auth.forgot_password')->name('forgot_password');
Route::view('reset-password', 'frontend.auth.reset_password')->name('reset_password');

//Project
Route::view('project_details', 'frontend.project_details')->name('project_details');

//Static Route
Route::view('about', 'frontend.about')->name('about');
Route::view('contact', 'frontend.contact')->name('contact');
Route::view('requested-property','frontend.requested_property')->name('requested_property');

//Policy
Route::view('privacy-policy', 'frontend.privacy_policy')->name('privacy_policy');
Route::view('term-and-condition', 'frontend.term_and_condition')->name('term_and_condition');
Route::view('faq', 'frontend.faq')->name('faq');
Route::view('cancel-and-refund-policy', 'frontend.cancel-and-refund-policy')->name('cancel_and_refund_policy');

//Plan
Route::get('plan',[PlanController::class,'plan'])->name('plan');

//Property
Route::get('properties',[PropertyController::class,'propertyList'])->name('properties');
Route::get('/{slug}',[PropertyController::class,'detail'])->name('property.detail');

//Enquiry
Route::post('enquiry-store',[EnquiryController::class,'store'])->name('enquiry.store');

Route::group(['middleware'=>['auth:web']],function () {

    Route::group(['prefix'=>'user','as'=>'user.'],function () {

        //Dashboard
        Route::view('dashboard','frontend.user.dashboard')->name('dashboard');

        //Register Property
        Route::get('property-index',[PropertyListingController::class,'index'])->name('property.index');
        Route::get('property-listing',[PropertyListingController::class,'create'])->name('property.listing');
        Route::post('property-listing-store',[PropertyListingController::class,'store'])->name('property.listing.store');
        Route::get('property-listing-edit/{id}',[PropertyListingController::class,'edit'])->name('property.listing.edit');
        Route::put('property-listing-update/{id}',[PropertyListingController::class,'update'])->name('property.listing.update');
        Route::get('property-listing-status/{id}/{status}',[PropertyListingController::class,'status'])->name('property.listing.status');

        //Profile
        Route::get('profile',[UserProfileController::class,'profile'])->name('profile');
        Route::post('save-profile',[UserProfileController::class,'saveProfile'])->name('save.profile');

        //Leads
        Route::view('leads','frontend.user.leads')->name('leads');

        //Plan Purchase
        Route::get('subscription-list',[PlanController::class,'index'])->name('subscription.list');
        Route::post('attempt-plan-purchase',[PlanController::class,'attemptPlanPurchase'])->name('attempt.plan.purchase');
        Route::get('instamojo/payment/pay-success',[InstamojoController::class, 'success'])->name('instamojo.success');

        //Add Project
        Route::get('project-list', [ProjectController::class,'index'])->name('project.list');
        Route::get('add-project', [ProjectController::class,'create'])->name('add.project');
        Route::post('store-project',[ProjectController::class,'store'])->name('store.project');
        Route::get('edit-project/{id}',[ProjectController::class,'edit'])->name('edit.project');
        Route::put('update-project/{id}',[ProjectController::class,'update'])->name('update.project');

        Route::get('enquiry-index',[EnquiryController::class,'index'])->name('enquiry.index');

        //Logout
        Route::post('logout',[LoginController::class,'logout'])->name('logout');

    });

    // Upload multiple Images
    Route::any('aiz-uploader', [AizUploadController::class, 'show_uploader']);
    Route::post('aiz-uploader/upload', [AizUploadController::class, 'upload']);
    Route::get('aiz-uploader/get_uploaded_files', [AizUploadController::class, 'get_uploaded_files']);
    Route::delete('aiz-uploader/destroy/{id}', [AizUploadController::class, 'destroy']);
    Route::post('aiz-uploader/get_file_by_ids', [AizUploadController::class, 'get_preview_files']);
    Route::get('aiz-uploader/download/{id}', [AizUploadController::class, 'attachment_download'])->name('download_attachment');

});

