<?php


use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\AmenityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Admin\PincodeController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\PurchasePlanController;
use App\Http\Controllers\Admin\AssociateWalletController;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

//Login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('login', [LoginController::class, 'login'])->name('admin.login.submit');

Route::group(['middleware'=>'auth:admin','as'=>'admin.'],function () {
    //Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    //Address
    Route::resource('countries',CountryController::class);
    Route::resource('states',StateController::class);
    Route::resource('cities',CityController::class);
    Route::get('get-cities-by-state',[CityController::class,'getCitiesByState'])->name('get.cities.by.state');
    Route::resource('pincodes',PincodeController::class);

    //Project
    Route::get('project-index',[ProjectController::class,'index'])->name('project.index');
    Route::get('project-edit/{id}',[ProjectController::class,'edit'])->name('project.edit');
    Route::put('project-update/{id}',[ProjectController::class,'update'])->name('project.update');
    Route::get('project-status/{id}/{status}',[ProjectController::class,'status'])->name('project.status');

    //Property
    Route::resource('property',PropertyController::class);
    Route::get('property-trust-seal-status/{id}/{status}',[PropertyController::class,'trustSealStatus'])->name('property.trust.seal.status');
    Route::get('property-featured-status/{id}/{status}',[PropertyController::class,'featuredStatus'])->name('property.featured.status');
    Route::get('property-demanded-status/{id}/{status}',[PropertyController::class,'demandedStatus'])->name('property.demanded.status');
    Route::get('property-trending-status/{id}/{status}',[PropertyController::class,'trendingStatus'])->name('property.trending.status');
    Route::get('property-published-status/{id}/{status}',[PropertyController::class,'publishedStatus'])->name('property.published.status');
    Route::get('property-enquiry/{id}',[PropertyController::class,'enquiry'])->name('property.enquiry');

    //Customers
    Route::get('customer-index',[UserController::class,'index'])->name('customer.index');
    Route::get('customer-edit/{id}',[UserController::class,'edit'])->name('customer.edit');
    Route::put('customer-update/{id}',[UserController::class,'update'])->name('customer.update');
    Route::get('customer-verify-status/{id}/{status}',[UserController::class,'verifyStatus'])->name('customer.verify.status');
    Route::get('customer-block-status/{id}/{status}',[UserController::class,'verifyBlock'])->name('customer.block.status');
    Route::get('customer-plan-purchase/{id}',[UserController::class,'planPurchase'])->name('customer.plan.purchase');

    //Purchase Plan
    Route::get('purchase-plan-index',[PurchasePlanController::class,'index'])->name('purchase.plan.index');

    //Plans
    Route::resource('plan', PlanController::class);

    //Sliders
    Route::resource('sliders', SliderController::class);

    //Banners
    Route::resource('banners', BannerController::class)->except('create','show','edit','update');

    Route::resource('faqs', FaqController::class)->except('show');

    //Enquiry
    Route::get('enquiry-index',[EnquiryController::class,'index'])->name('enquiry.index');

    //Change Password
    Route::post('change-password',[DashboardController::class,'changePassword'])->name('change.password');

    //Amenity
    Route::resource('amenities', AmenityController::class);

    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
