<?php


use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PhaseController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\PincodeController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CommissionController;
use App\Http\Controllers\Admin\BookPropertyController;
use App\Http\Controllers\Admin\LevelPercentController;
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

    //Inventory Management

        //Property
        Route::resource('property',PropertyController::class);
        Route::get('duplicate-property/{property_id}',[PropertyController::class,'duplicateProperty'])->name('duplicate.property');

    //Sliders
    Route::resource('sliders', SliderController::class);

    //Change Password
    Route::post('change-password',[DashboardController::class,'changePassword'])->name('change.password');

    Route::post('logout/', [LoginController::class, 'logout'])->name('logout');
});
