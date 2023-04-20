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

    //Customer
    Route::get('customers',[UserController::class,'customers'])->name('customers');
    Route::get('verify_status',[UserController::class,'verifyStatus'])->name('verifiy.status');
    Route::get('kyc_status',[UserController::class,'kycStatus'])->name('kyc.status');
    Route::get('add-customer',[UserController::class,'addCustomer'])->name('add.customer');
    Route::post('save-customer',[UserController::class,'saveCustomer'])->name('save.customer');
    Route::get('edit-customer/{id}',[UserController::class,'editCustomer'])->name('edit.customer');
    Route::post('update-customer',[UserController::class,'updateCustomer'])->name('update.customer');
    Route::post('update-profile',[UserController::class,'updateProfile'])->name('update.profile');
    Route::post('update-bank-detail',[UserController::class,'updateBankDetail'])->name('update.bank.detail');

    //Associate
    Route::get('associates',[UserController::class,'associates'])->name('associates');
    Route::get('add-associate',[UserController::class,'addAssociate'])->name('add.associate');
    Route::post('save-associate',[UserController::class,'saveAssociate'])->name('save.associate');
    Route::get('edit-associate/{id}',[UserController::class,'editAssociate'])->name('edit.associate');
    Route::post('update-associate',[UserController::class,'updateAssociate'])->name('update.associate');

    //Address
    Route::resource('countries',CountryController::class);
    Route::resource('states',StateController::class);
    Route::resource('cities',CityController::class);
    Route::get('get-cities-by-state',[CityController::class,'getCitiesByState'])->name('get.cities.by.state');
    Route::resource('pincodes',PincodeController::class);
    // Route::get('add-pincodes',[PincodeController::class,'addPincodes'])->name('add.pincode');

    //Inventory Management

        //Project
        Route::resource('project',ProjectController::class);

        //Phase
        Route::resource('phase',PhaseController::class);
        Route::get('get-phase/{project_id}',[PhaseController::class,'getPhase'])->name('get.phase');
        Route::get('get-plot-number/{phase_id}',[PhaseController::class,'getPlotNumber'])->name('get.plot.number');

        //Feature
        Route::resource('feature',FeatureController::class);

        //Property
        Route::resource('property',PropertyController::class);
        Route::get('duplicate-property/{property_id}',[PropertyController::class,'duplicateProperty'])->name('duplicate.property');

    //Associate Wallet
    Route::get('associate-wallet-index/{associate_id}',[AssociateWalletController::class,'index'])->name('associate.wallet.index');
    Route::post('associate-wallet-store',[AssociateWalletController::class,'store'])->name('associate.wallet.store');

    //Booked Property
    Route::get('booked-property-index',[BookPropertyController::class,'bookedPropertyIndex'])->name('booked.property.index');

    //Sliders
    Route::resource('sliders', SliderController::class);

    //Level Percent
    Route::resource('level-percent', LevelPercentController::class);

    //Commission
    Route::get('commission-index',[CommissionController::class,'index'])->name('commission.index');

    //Change Password
    Route::post('change-password',[DashboardController::class,'changePassword'])->name('change.password');

    Route::post('logout/', [LoginController::class, 'logout'])->name('logout');
});
