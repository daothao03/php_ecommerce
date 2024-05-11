<?php

namespace App\Providers;

// use Illuminate\Contracts\Pagination\Paginator;

use App\Models\EmailConfiguration;
use App\Models\GeneralSetting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Config;
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

        $generalSetting = GeneralSetting::first();
        $mailSetting = EmailConfiguration::first();

        // /** Set Mail Config */
        // Config::set('mail.mailers.smtp.host', $mailSetting->host);
        // Config::set('mail.mailers.smtp.port', $mailSetting->port);
        // Config::set('mail.mailers.smtp.encryption', $mailSetting->encryption);
        // Config::set('mail.mailers.smtp.username', $mailSetting->username);
        // Config::set('mail.mailers.smtp.password', $mailSetting->password);

        Config::set('app.timezone', $generalSetting->time_zone);

        View::composer('*', function($view) use ($generalSetting){
            $view->with('settings' , $generalSetting);
        });

    }
}