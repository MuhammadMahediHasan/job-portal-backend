<?php

namespace App\Providers;

use App\Models\GeneralSetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        Passport::ignoreRoutes();

        Passport::tokensCan([
            'job_seeker' => 'Job Seeker Type',
            'company' => 'Company User Type',
        ]);

        $generalSetting = GeneralSetting::query()->first();
        View::share('generalSetting', $generalSetting);
    }
}
