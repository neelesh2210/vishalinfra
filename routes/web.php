<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\BookPropertyController;
use App\Http\Controllers\UserBankDetailController;
use App\Http\Controllers\AssociateWalletController;
use App\Http\Controllers\PropertyBookingRequestController;

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

Auth::routes(['login'=>false,'register'=>false,'logout'=>false]);

Route::get('/', [HomeController::class, 'index'])->name('index');

//Register
Route::get('signup',[RegisterController::class,'register'])->name('signup');
Route::post('registration',[RegisterController::class,'registration'])->name('registartion');

//Login
Route::get('signin',[LoginController::class,'signin'])->name('signin');
Route::post('login',[LoginController::class,'login'])->name('login');


//Static Route
Route::view('about', 'frontend.about')->name('about');
Route::view('contact', 'frontend.contact')->name('contact');
Route::view('submit-property', 'frontend.submit-property')->name('submit_property');

//Property
Route::get('properties',[PropertyController::class,'propertyList'])->name('properties');
Route::get('/{slug}',[PropertyController::class,'detail'])->name('property.detail');
// Route::get('properties_details',[PropertyController::class,'properties_details'])->name('properties_details');

//Associate Register
// Route::get('associate-register',[RegisterController::class,'associateRegister'])->name('associate.register');


Route::group(['middleware'=>['auth:web'],'prefix'=>'user','as'=>'user.'],function () {

    //Dashboard
    Route::view('dashboard','frontend.user_dashboard.dashboard')->name('dashboard');

    //Profile
    // Route::get('profile',[UserProfileController::class,'profile'])->name('profile');
    // Route::post('save-profile',[UserProfileController::class,'saveProfile'])->name('save.profile');

    //KYC
    // Route::get('kyc',[UserProfileController::class,'kyc'])->name('kyc');
    // Route::post('save-kyc',[UserProfileController::class,'saveKyc'])->name('save.kyc');

    //Bank Detail
    // Route::post('save-bank-detail',[UserBankDetailController::class,'saveBankDetail'])->name('save.bank.detail');

    //Customers
    // Route::get('customer-index',[CustomerController::class,'index'])->name('customer.index');
    // Route::get('customer-create',[CustomerController::class,'create'])->name('customer.create');

    //Associate Wallet Transation
    // Route::get('associate-wallet-transaction-index',[AssociateWalletController::class,'index'])->name('associate.wallet.transaction.index');

    //Referral Link
    // Route::view('referral-link','frontend.user_dashboard.referral_link')->name('referral.link');

    //Property
    // Route::get('property-index',[PropertyController::class,'index'])->name('property.index');
    // Route::get('property-detail/{property_id}',[PropertyController::class,'propertyDetail'])->name('property.detail');

    //Property Book
    // Route::post('property-book',[BookPropertyController::class,'propertyBook'])->name('property.book');

    //Commission Distribution
    // Route::get('commission-distribution/{assocaite_id}/{property_id}/{amount}',[BookPropertyController::class,'commissionDistribution'])->name('commission.distribution');

    //Property Booking Request
    // Route::get('property-booking-request-list',[PropertyBookingRequestController::class,'propertyBookingRequestList'])->name('property.booking.request.list');
    // Route::get('property-booking-request/{property_id}',[PropertyBookingRequestController::class,'propertyBookingRequest'])->name('property.booking.request');
    // Route::get('property-booking-change-status/{id}/{status}',[PropertyBookingRequestController::class,'propertyBookingChangeStatus'])->name('property.booking.change.status');

    //Logout
    Route::post('user-logout',[LoginController::class,'logout'])->name('logout');

});
