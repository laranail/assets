<?php declare(strict_types=1);

namespace Simtabi\Laranail\Assets\Facades;

use Illuminate\Support\Facades\Facade;
use Simtabi\Laranail\Assets\Assets;

class AssetsFacade extends Facade
{

    protected static function getFacadeAccessor(): string
    {
        return Assets::class;
    }

}
