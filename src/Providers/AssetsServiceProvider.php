<?php

declare(strict_types=1);

namespace Simtabi\Laranail\Assets\Providers;

use Illuminate\Support\ServiceProvider;

class AssetsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // In register(), not boot(): a merged default must exist before any other provider's boot()
        // can resolve Assets, and before config:cache snapshots the repository.
        $this->mergeConfigFrom(__DIR__ . '/../../config/config.php', 'laranail.assets');
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'laranail/assets');

        if ($this->app->runningInConsole()) {
            // config/laranail/assets.php is what Laravel loads as `laranail.assets`. The tag used
            // to write config/assets.php -- a bare key nothing registered -- which Assets now reads
            // only as a deprecated fallback.
            $this->publishes([
                __DIR__ . '/../../config/config.php' => config_path('laranail/assets.php'),
            ], 'laranail::assets-config');

            $this->publishes([
                __DIR__ . '/../../resources/views' => resource_path('views/vendor/laranail/assets'),
            ], 'laranail::assets-views');
        }

    }
}
