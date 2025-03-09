<?php

namespace App\Providers;

use App\Exceptions\CustomExceptionHandler;
use App\Services\Clicksight;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ExceptionHandler::class, CustomExceptionHandler::class);

        $this->app->singleton(Clicksight::class, function($app){
            $user = (request()->user()) ? request()->user() : getServiceUser();
            return new Clicksight($user);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }
    }
}
