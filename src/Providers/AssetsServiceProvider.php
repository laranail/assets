<?php declare(strict_types=1);

namespace Simtabi\Laranail\Assets\Providers;

use Illuminate\Support\ServiceProvider;

class AssetsServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/config.php', 'assets');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'assets');

        if ($this->app->runningInConsole())
        {
            $this->publishes([
                __DIR__ . '/../../config/config.php' => config_path('assets.php')
            ], 'laranail::assets-config');

            $this->publishes([
                __DIR__ . '/../../resources/views'   => resource_path('views/vendor/assets')
            ], 'laranail::assets-views');
        }

    }

}
