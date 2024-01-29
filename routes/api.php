<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BarberController;
use App\Http\Controllers\BarberDayOffController;
use App\Http\Controllers\BarberServiceController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientAddressController;
use App\Http\Controllers\ClientPushIdController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CountryHolidayController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ShopManagerController;
use App\Http\Controllers\ShopManagerTimeSetController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmailingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['api_token']], function () {
    // APPOINTMENTS
    Route::get('/appointments/getWithDetails', [AppointmentController::class, 'getWithDetails']);
    Route::apiResource('appointments', AppointmentController::class);

    // BARBERS
    Route::get('/barbers/getWithDetails', [BarberController::class, 'getWithDetails']);
    Route::get('/barbers/getAvailabilityByIdAndDate/{id}/{date}/{duration}', [BarberController::class, 'getAvailabilityByIdAndDate']);
    Route::apiResource('barbers', BarberController::class);

    // BARBER DAYS OFF
    Route::get('/barberDaysOff/getByBarberId/{barberId}', [BarberDayOffController::class, 'getByBarberId']);
    Route::get('/barberDaysOff/getByShopManagerId/{shopManagerId}', [BarberDayOffController::class, 'getByShopManagerId']);
    Route::apiResource('barberDaysOff', BarberDayOffController::class);

    // BARBER SERVICES
    Route::get('/barberServices/getUnassignedByBarberId/{barberId}', [BarberServiceController::class, 'getUnassignedByBarberId']);
    Route::delete('/barberServices/deleteByBarberIdAndServiceId/{barberId}/{serviceId}', [BarberServiceController::class, 'deleteByBarberIdAndServiceId']);
    Route::apiResource('barberServices', BarberServiceController::class);

    // CLIENTS
    Route::post('/clients/login', [ClientController::class, 'login']);
    Route::post('/clients/logout', [ClientController::class, 'logout']);
    Route::post('/clients/deleteAccount/{id}', [ClientController::class, 'deleteAccount']);
    Route::get('/clients/generateOtpByClientId/{clientId}', [ClientController::class, 'generateOtpByClientId']);
    Route::get('/clients/generateOtpByPhoneNumber/{phoneNumber}', [ClientController::class, 'generateOtpByPhoneNumber']);
    Route::get('/clients/verifyOtp/{clientId}/{otp}', [ClientController::class, 'verifyOtp']);
    Route::apiResource('clients', ClientController::class);

    // CLIENT ADDRESSES
    Route::get('/clientAddresses/getByClientId/{clientId}', [ClientAddressController::class, 'getByClientId']);
    Route::apiResource('clientAddresses', ClientAddressController::class);

    // CLIENT PUSH IDS
    Route::apiResource('clientPushIds', ClientPushIdController::class);

    // COUNTRIES
    Route::apiResource('countries', CountryController::class);

    // COUNTRY HOLIDAYS
    Route::get('/countryHolidays/getByCountryId/{countryId}', [CountryHolidayController::class, 'getByCountryId']);
    Route::apiResource('countryHolidays', CountryHolidayController::class);

    // NOTIFICATIONS
    Route::post('/notifications/send', [NotificationController::class, 'send']);

    // SHOP MANAGERS
    Route::apiResource('shopManagers', ShopManagerController::class);

    // SHOP MANAGER TIME SETS
    Route::apiResource('shopManagerTimeSets', ShopManagerTimeSetController::class);

    // SERVICE
    Route::get('/services/getByCountryId/{countryId}', [ServiceController::class, 'getByCountryId']);
    Route::apiResource('services', ServiceController::class);

    // USERS
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/login', [UserController::class, 'login']);
    Route::post('/logout', [UserController::class, 'logout']);
    Route::apiResource('users', UserController::class);
});

Route::get('email/{type}', [EmailingController::class, "sendEmail"]);
