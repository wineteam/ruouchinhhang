<?php

namespace App\Providers;

use App\Models\LanguageSwitch;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
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
        Paginator::useBootstrap();
        if(Schema::hasTable('language_switches')) {
          $languages = LanguageSwitch::get();
          view()->share('languages', $languages);
        }
    }
}
