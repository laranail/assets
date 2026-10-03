<?php

declare(strict_types=1);

use Simtabi\Laranail\Assets\Assets;
use Illuminate\Support\Facades\Config;

/**
 * The provider registers the defaults at `laranail.assets`. Until 2026-10 the class read the bare
 * `assets` key instead, which nothing populates on a fresh install, so resolving `Assets` threw on
 * a null index and every documented call failed. Only an application that had published the config
 * (to the bare `config/assets.php`) ever had a working package.
 */
it('resolves on a fresh install, from the defaults registered at laranail.assets', function (): void {
    $assets = app(Assets::class);

    expect($assets->getStyles())->not->toBeEmpty()
        ->and(Config::get('assets'))->toBeNull();
});

it('takes its script and style lists from laranail.assets', function (): void {
    Config::set('laranail.assets.scripts', []);
    Config::set('laranail.assets.styles', []);

    $assets = app(Assets::class);

    expect($assets->getScripts('header'))->toBe([])
        ->and($assets->getScripts('footer'))->toBe([])
        ->and($assets->getStyles())->toBe([]);
});

/**
 * The working population before the fix: applications that published the old bare file. Their
 * override keeps winning, so the repair changes nothing for anyone the package already worked for.
 */
it('still honours a config published to the old bare config/assets.php', function (): void {
    Config::set('assets', array_replace(Config::get('laranail.assets'), [
        'styles'  => [],
        'scripts' => [],
    ]));

    $assets = app(Assets::class);

    expect($assets->getScripts('header'))->toBe([])
        ->and($assets->getScripts('footer'))->toBe([])
        ->and($assets->getStyles())->toBe([]);
});

/** addStyles() used to merge into the script list, so a stylesheet was rendered as a <script>. */
it('adds styles to the styles, not the scripts', function (): void {
    Config::set('laranail.assets.scripts', []);
    Config::set('laranail.assets.styles', []);
    Config::set('laranail.assets.resources.styles.invoice', [
        'use_cdn' => false,
        'src'     => ['local' => '/css/invoice.css'],
    ]);

    $assets = app(Assets::class)->addStyles('invoice');

    expect($assets->getScripts('header'))->toBe([])
        ->and($assets->getScripts('footer'))->toBe([])
        ->and(json_encode($assets->getStyles(), JSON_UNESCAPED_SLASHES))->toContain('/css/invoice.css');
});
