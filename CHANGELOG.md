# Changelog

All notable changes to `laranail/assets` are documented in this file.

The format follows [Keep a Changelog](https://keepachangelog.com/en/1.1.0/)
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]
### Fixed

- **`Assets` resolves on a fresh install.** It read its config from the bare `assets` key while
  the provider registers it at `laranail.assets`, so every call threw *"Trying to access array
  offset on null"* unless the config had been published. It now reads `laranail.assets`.
- **`addStyles()` adds styles.** It merged into the script list, so a stylesheet rendered as a
  `<script>` tag.
- The config default is merged in `register()`, so it exists before other providers boot.

### Deprecated

- **A config published to `config/assets.php`** is still honoured, so an existing override keeps
  working. Republish with `--tag=laranail::assets-config`, which now writes
  `config/laranail/assets.php`, and delete the old file. Support for the old path can go in a
  future minor release.

### Added

- A `Quick start` section in the README.

## v0.1.0

### Changed

- **Public names are vendor-scoped.** The config key is `laranail.assets` and the view namespace
  `laranail/assets`, where both were the bare `assets`. Publish tags were already scoped.
  Breaking for anyone reading the old names.
- **PHP `>=8.0` → `^8.4.1 || ^8.5`**, the family floor.
- **Requires the `illuminate/*` components it uses** rather than `laravel/framework`.
- **`laravel/pint` moved to `require-dev`.** It was in `require`, forcing a dev tool into every
  consuming application.

### Added

- A test suite and CI, neither of which this package had.
- `LICENSE` (MIT), and a `docs/` tree.

[Unreleased]: https://github.com/laranail/assets/compare/v0.1.0...HEAD
