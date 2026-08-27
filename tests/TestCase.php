<?php

declare(strict_types=1);

namespace Simtabi\Laranail\Assets\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Simtabi\Laranail\Assets\Providers\AssetsServiceProvider;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [AssetsServiceProvider::class];
    }
}
