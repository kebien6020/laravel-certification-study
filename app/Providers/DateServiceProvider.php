<?php

namespace App\Providers;

use App\Contracts\DateHelper;
use App\Services\DateHelperColombia;
use Illuminate\Support\ServiceProvider;

class DateServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(DateHelper::class, function () {
            return new DateHelperColombia();
        });
    }

    public function boot()
    {
        $tz = $this->app->make(DateHelper::class)->timezone();
        date_default_timezone_set($tz);
    }
}
