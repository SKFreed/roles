<?php

namespace App\Providers;

use App\Right;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class RightServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return bool
     */
    public function boot()
    {
        try {
            Right::get()->map(function ($right) {
                Gate::define($right->name, function ($user) use ($right) {
                    return $user->hasRightTo($right);
                });
            });
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }
}
