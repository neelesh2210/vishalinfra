<?php


use App\Http\Controllers\Admin\EmiController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PayoutContoller;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ChargeController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\AmenityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\PincodeController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CommissionController;
use App\Http\Controllers\Admin\WebsiteDataController;
use App\Http\Controllers\Admin\BookPropertyController;
use App\Http\Controllers\Admin\LevelPercentController;
use App\Http\Controllers\Admin\PurchasePlanController;
use App\Http\Controllers\Admin\RefundPropertyController;
use App\Http\Controllers\Admin\AssociateWalletController;
use App\Http\Controllers\Admin\InstallmentRequestController;


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

    //Store Media
    Route::post('store-media', [ImageUploadController::class, 'storeMedia'])->name('store.media');

    //Level Percent
    Route::resource('level-percent', LevelPercentController::class);

    //Installment Request
    Route::get('installment-request-list',[InstallmentRequestController::class,'list'])->name('installment.request.list');
    Route::post('installment-request-status',[InstallmentRequestController::class,'status'])->name('installment.request.status');

    //Booked Property
    Route::get('booked-property-index',[BookPropertyController::class,'bookedPropertyIndex'])->name('booked.property.index');
    Route::get('booked-property-detail/{booking_id}',[BookPropertyController::class,'bookedPropertyDetail'])->name('booked.property.detail');
    Route::post('booked-property-store',[BookPropertyController::class,'bookedPropertyStore'])->name('booked.property.store');
    Route::get('property-installment/{booking_id}',[BookPropertyController::class,'propertyInstallment'])->name('property.installment');
    Route::get('property-installment-invoice/{installment_id}',[BookPropertyController::class,'invoice'])->name('property.installment.invoice');

    //Emi
    Route::get('convert-to-emi/{book_property_id}',[EmiController::class,'convertToEmi'])->name('convert.to.emi');
    Route::post('convert-to-emi-store/{book_property_id}',[EmiController::class,'convertToEmiStore'])->name('convert.to.emi.store');
    Route::get('emi-property-list',[EmiController::class,'emiPropertyList'])->name('emi.property.list');
    Route::get('property-emi/{booking_id}',[EmiController::class,'PropertyEmi'])->name('property.emi');
    Route::post('calculate-emi',[EmiController::class,'calculateEmi'])->name('calculate.emi');
    Route::post('final-emi',[EmiController::class,'finalEmi'])->name('final.emi');
    Route::post('final-emi-store',[EmiController::class,'finalEmiStore'])->name('final.emi.store');

    //Refund Property
    Route::get('refund-property-index/{book_property_id}',[RefundPropertyController::class,'index'])->name('refund.property.index');
    Route::post('refund-property-store/{book_property_id}',[RefundPropertyController::class,'store'])->name('refund.property.store');
    Route::get('refund-property-list',[RefundPropertyController::class,'list'])->name('refund.property.list');

    Route::get('sold-property-index',[BookPropertyController::class,'soldPropertyIndex'])->name('sold.property.index');

    //Charge
    Route::get('charge',[ChargeController::class,'index'])->name('charge');
    Route::post('charge-store',[ChargeController::class,'store'])->name('charge.store');
    Route::post('calculate-charge',[ChargeController::class,'calculateCharge'])->name('calculate.charge');

    //Billing Info
    Route::get('billing-info',[WebsiteDataController::class,'billingInfo'])->name('billing.info');
    Route::post('billing-info-store',[WebsiteDataController::class,'billingInfoStore'])->name('billing.info.store');

    //Payments
    Route::get('payments',[PaymentController::class,'index'])->name('payments');

    //Payout
    Route::get('payout-index',[PayoutContoller::class,'index'])->name('payout.index');
    Route::post('payout-store',[PayoutContoller::class,'store'])->name('payout.store');
    Route::get('payout-success-index',[PayoutContoller::class,'success'])->name('payout.success.index');
    Route::get('payout-invoice/{payout_id}',[PayoutContoller::class,'invoice'])->name('payout.invoice');

    //Commission
    Route::get('commission-index',[CommissionController::class,'index'])->name('commission.index');

    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
