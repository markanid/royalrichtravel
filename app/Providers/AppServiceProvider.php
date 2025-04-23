<?php

namespace App\Providers;

use App\Models\Admin\Contact;
use App\Models\Admin\MetaData;
use App\Models\Admin\Service;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::share('metadata', MetaData::oldest('created_at')->first());
        View::share('contact', Contact::oldest('created_at')->first());
        View::share('services', Service::oldest('created_at')->first());
    }
}
