<?php

namespace App\Providers;

use App\Models\Appointment;
use App\Models\Barber;
use App\Models\BarberDayOff;
use App\Models\BarberService;
use App\Models\Client;
use App\Models\Country;
use App\Models\CountryHoliday;
use App\Models\Service;
use App\Models\ShopManager;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Appointment::observe(AppointmentObserver::class);
        // Barber::observe(BarberObserver::class);
        // BarberDayOff::observe(BarberDayOffObserver::class);
        // BarberService::observe(BarberServiceObserver::class);
        // Client::observe(ClientObserver::class);
        // Country::observe(CountryObserver::class);
        // CountryHoliday::observe(CountryHolidayObserver::class);
        // Service::observe(ServiceObserver::class);
        // ShopManager::observe(ShopManagerObserver::class);
    }
}
