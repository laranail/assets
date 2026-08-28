<?php

declare(strict_types=1);

namespace Simtabi\Laranail\Assets\Facades;

use Simtabi\Laranail\Assets\Assets;
use Illuminate\Support\Facades\Facade;

class AssetsFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Assets::class;
    }
}
