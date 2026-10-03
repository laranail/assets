# laranail/assets

[![Tests](https://github.com/laranail/assets/actions/workflows/tests.yml/badge.svg)](https://github.com/laranail/assets/actions/workflows/tests.yml)
[![Static analysis](https://github.com/laranail/assets/actions/workflows/static-analysis.yml/badge.svg)](https://github.com/laranail/assets/actions/workflows/static-analysis.yml)
[![License MIT](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

`laranail/assets` is not published to Packagist, so there is no registry-version badge to show: see [Install](#install).

> An opinionated HTML asset manager for Laravel.

Requires PHP `^8.4.1 || ^8.5` and Laravel `^13.0`.

## Install

```bash
composer require laranail/assets
```

## Quick start guide and usage

### Getting started

1. Publish the config and declare each asset under `resources.scripts` or `resources.styles`;
   the top-level `scripts` and `styles` lists name the ones loaded on every page.

   ```bash
   php artisan vendor:publish --tag=laranail::assets-config
   ```

2. `ASSETS_OFFLINE` defaults to `true`, which serves every asset from its `local` source. Set it to
   `false` to use the `cdn` source of assets marked `use_cdn`. `ASSETS_ENABLE_VERSION=true` appends
   `?v=` plus `ASSETS_VERSION` to each URL.

### Usage

```blade
{{-- resources/views/layouts/app.blade.php --}}
<head>
    {!! Assets::renderHeader() !!}
</head>
<body>
    @yield('content')

    {!! Assets::renderFooter() !!}
</body>

{{-- resources/views/checkout.blade.php --}}
@extends('layouts.app')

@php(Assets::addScriptsDirectly('js/checkout.js'))
```

```php
// Queue assets declared under resources.* by name, from a controller or a view
Assets::addScripts(['modernizr'])->addStyles(['bootstrap']);
```

The registered names and design are in [Architecture](docs/architecture.md); everything else is in the [documentation index](#documentation).

## <a name="documentation"></a>Documentation

Full documentation is at
**[opensource.simtabi.com/documentation/laranail/assets](https://opensource.simtabi.com/documentation/laranail/assets/)**.

### Project

- [Architecture](docs/architecture.md) — what this package registers, and under which names.

## License

MIT. See [LICENSE](LICENSE).
