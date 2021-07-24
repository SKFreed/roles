<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
     * @return void
     */
    public function boot()
    {
        Blade::directive('right', function ($right){
            return "<?php if(auth()->check() && auth()->user()->hasRight({$right})): ?>";
        });
        Blade::directive('endright', function ($right){
            return "<?php endif; ?>";
        });
    }
}
