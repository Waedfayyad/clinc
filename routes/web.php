<?php

use App\Http\Controllers\ClinicController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicesController;

Route::group(['prefix' => 'services'], function () {
    Route::get('/', [ServicesController::class, 'index'])->name('services.index');
    Route::get('/create/{id}', [ServicesController::class, 'create'])->name('services.create');
    Route::post('/', [ServicesController::class, 'store'])->name('services.store');
    Route::get('/{service}', [ServicesController::class, 'show'])->name('services.show');
    Route::get('/{service}/edit', [ServicesController::class, 'edit'])->name('services.edit');
    Route::put('/{service}', [ServicesController::class, 'update'])->name('services.update');
    Route::delete('/{service}', [ServicesController::class, 'destroy'])->name('services.destroy');
    });

Route::group(['prefix' => 'payments'], function () {
    Route::get('/', [PaymentsController::class, 'index'])->name('payments.index');
    Route::get('/create/{id}', [PaymentsController::class, 'create'])->name('payments.create');
    Route::post('/', [PaymentsController::class, 'store'])->name('payments.store');
    Route::get('/{id}/edit', [PaymentsController::class, 'edit'])->name('payments.edit');
    Route::put('/{id}', [PaymentsController::class, 'update'])->name('payments.update');
    Route::delete('/{id}', [PaymentsController::class, 'destroy'])->name('payments.destroy');
    Route::get('/{id}', [PaymentsController::class, 'show'])->name('payments.show');
    Route::get('/customer/{customerId}/clinic/{clinicId}', [PaymentsController::class, 'getPaymentsForCustomer'])->name('payments.customer.clinic');
    });

Route::group(['prefix' => 'users'], function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/', [UserController::class, 'store'])->name('users.store');
    Route::get('/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    });

Route::group(['prefix' => 'clinic'], function () {
    Route::get('/', [ClinicController::class, 'index'])->name('clinic.index');
    Route::get('/create', [ClinicController::class, 'create'])->name('clinic.create');
    Route::post('/', [ClinicController::class, 'store'])->name('clinic.store');
    Route::get('/{id}', [ClinicController::class, 'show'])->name('clinic.show');
    Route::get('/{id}/edit', [ClinicController::class, 'edit'])->name('clinic.edit');
    Route::put('/{id}', [ClinicController::class, 'update'])->name('clinic.update');
    Route::delete('/{id}', [ClinicController::class, 'destroy'])->name('clinic.destroy');
    });

    Route::get('/search', [SearchController::class, 'searchByUserNameForClinic'])->name('search.searchByUserNameForClinic');
    Route::get('/search/employees', [SearchController::class, 'searchForClinicEmployee'])->name('search.searchForClinicEmployee');
    Route::get('/search/getTodayCustomers', [SearchController::class, 'getTodayCustomers'])->name('search.getTodayCustomers');
    Route::get('/search/customerMony/{id}', [SearchController::class, 'customerMony'])->name('search.customerMony');
    Route::get('/search/getTodayMony', [SearchController::class, 'getTodayMony'])->name('search.getTodayMony');
    Route::get('/search/getTodayPayments', [SearchController::class, 'getTodayPayments'])->name('search.getTodayPayments');
    
Route::controller(UserController::class)->group(function(){

    Route::get('login', 'login')->name('login');
    Route::get('/', 'welcome')->name('welcome');
    Route::get('/welcome1', 'welcome1')->name('welcome1');
    Route::get('UnderConstruction', 'UnderConstruction')->name('UnderConstruction');
    Route::get('registration', 'registration')->name('registration');
    Route::get('logout', 'logout')->name('logout');
    Route::post('validate_registration', 'validate_registration')->name('sample.validate_registration');
    Route::post('validate_login', 'validate_login')->name('sample.validate_login');
    Route::get('dashboard', 'dashboard')->name('dashboard');
    Route::get('aboute','aboute' )->name('aboute');
    Route::get('contact','contact' )->name('contact');
    Route::get('doctor', 'user1')->name('user1');
    Route::get('secretary', 'user2')->name('user2');
    Route::get('serviec_table', 'user3')->name('user3');
    Route::get('verify-user', 'verifyUser')->name('verifyUser');



    /*fore test perposes*/
    Route::get('/payments/{customerId}{ClinicId}', 'App\Http\Controllers\PaymentsController@getPaymentsForCustomer');
    Route::get('/services/customer/{customerId}{ClinicId}', 'App\Http\Controllers\SearchController@getServicesForCustomer');
    Route::get('/services/today/{ClinicId}', 'App\Http\Controllers\SearchController@getTodayCustomers');
    Route::get('/users/serch/{userName} ', 'App\Http\Controllers\UserController@getCustomerId');
    Route::get('/services/name/{userName}/clinic/{clinicId}', 'App\Http\Controllers\SearchController@searchByUserNameInClinicCustomer')->name('searchInClinicUsers');


});

