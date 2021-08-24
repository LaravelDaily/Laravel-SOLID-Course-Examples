<?php

namespace App\Providers;

use App\Interfaces\ReportInterface;
use App\Reports\ReportByMonth;
use App\Reports\TestReportByMonth;
use Illuminate\Support\Facades\App;
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
        if (App::environment(['local', 'staging'])) {
            $this->app->bind(ReportInterface::class, TestReportByMonth::class);
        } else {
            $this->app->bind(ReportInterface::class, ReportByMonth::class);
        }
    }
}
