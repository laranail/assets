![banner](.github/assets/banner.png?raw=true)

Assets
============
A highly opinionated HTML assets management library for the Laravel framework.

Laravel Assets management made easy.

Requirements
============

To be able to use this package you need to meet the following minimum requirements:
1. Laravel framework >= v9
2. PHP >= v8.0

****

## Installation

```bash
composer require laranail/assets
```

To publish views and config files for further manipulation, run the following commands:

```bash
php artisan vendor:publish laranail::assets-config
php artisan vendor:publish laranail::assets-views
```

#### Usage
Import the facade
```bash
use Assets;
```

Add to your master layout view, in `head` tag:

```php
{!! Assets::renderHeader() !!}
```

and before `body` tag close:

```php
{!! Assets::renderFooter() !!}
```

## Methods

### Add scripts

```php
Assets::addScripts(['assets-key-in-the-config-file']);
```

Example:

```php
Assets::addScripts(['app', 'bootstrap', 'jquery']);
```

### Add styles

```php
Assets::addStyles(['assets-key-in-the-config-file']);
```

Example:

```php
Assets::addStyles(['bootstrap', 'font-awesome']);
```

### Remove scripts

```php
Assets::removeScripts(['assets-key-in-the-config-file']);
```

Example:

```php
Assets::removeScripts(['bootstrap']);
```

### Remove styles

```php
Assets::removeStyles(['key-of-assets-in-config-file']);
```

Example:

```php
Assets::removeStyles(['font-awesome']);
```

### Others

- Set version for assets. Add to `.env`

```bash
ASSETS_VERSION=1.0
```

Then all assets will be added `?v=1.0.0`

- Change to online mode

```bash
ASSETS_OFFLINE=false
```

Then assets will be loaded from CDN if it's defined in config file.

- To disable versioning:

```bash
ASSETS_ENABLE_VERSION=false
```

Credits
============
This project wouldn't have been possible without the inspiration and ideas borrowed from many sources across the open source community,
we say thank you to the respective authors.

## Contributors

- [All Contributors](CONTRIBUTORS.md)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
