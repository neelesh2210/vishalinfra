<?php


use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\PincodeController;
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

    //Property
    Route::resource('property',PropertyController::class);
    Route::get('property-featured-status/{id}/{status}',[PropertyController::class,'featuredStatus'])->name('property.featured.status');

    //Customers
    Route::get('customer-index',[UserController::class,'index'])->name('customer.index');

    //Purchase Plan
    Route::get('purchase-plan-index',[PurchasePlanController::class,'index'])->name('purchase.plan.index');

    //Plans
    Route::resource('plan', PlanController::class);

    //Sliders
    Route::resource('sliders', SliderController::class);

    //Change Password
    Route::post('change-password',[DashboardController::class,'changePassword'])->name('change.password');

    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
