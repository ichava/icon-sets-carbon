# ichava/icon-sets-carbon

[![Packagist](https://img.shields.io/packagist/v/ichava/icon-sets-carbon)](https://packagist.org/packages/ichava/icon-sets-carbon)
[![Tests](https://github.com/ichava/icon-sets-carbon/actions/workflows/tests.yml/badge.svg)](https://github.com/ichava/icon-sets-carbon/actions/workflows/tests.yml)
[![Static analysis](https://github.com/ichava/icon-sets-carbon/actions/workflows/code-quality.yml/badge.svg)](https://github.com/ichava/icon-sets-carbon/actions/workflows/code-quality.yml)
[![License MIT and Apache-2.0](https://img.shields.io/badge/license-MIT%20code%20%7C%20Apache--2.0%20icons-blue.svg)](ATTRIBUTION.md)

The licence badge names both licences: the package code is MIT and the icons are Apache-2.0 (see [License](#license)).

> Carbon Icons for the Ichava Laravel icon ecosystem: 2,841 SVGs across `size-32` (2,773), `size-16` (68), vendored from `@carbon/icons`.

Requires [`ichava/core`](https://github.com/ichava/core) `^0.1` on PHP `^8.4.1 || ^8.5` and Laravel `^13`.

## Install

The `laranail/*` packages core depends on are not on Packagist yet, and neither is this pack, so the **application's** `composer.json` names them:

```json
{
    "repositories": [
        { "type": "vcs", "url": "https://github.com/ichava/icon-sets-carbon" },
        { "type": "vcs", "url": "https://github.com/laranail/package-tools" },
        { "type": "vcs", "url": "https://github.com/laranail/console" },
        { "type": "vcs", "url": "https://github.com/laranail/enumerator" },
        { "type": "vcs", "url": "https://github.com/laranail/db-tools" }
    ]
}
```

Then require the pack:

```bash
composer require ichava/icon-sets-carbon
```

The service provider is discovered automatically. Core's [installation guide](https://github.com/ichava/core/blob/main/docs/installation.md) covers core's own setup.

## Quick start guide and usage

### Getting started

Seed the pack once after installing it, and again after upgrading it:

```bash
php artisan ichava::ichava-core.database seed --package=ichava/icon-sets-carbon
```

The seed is not optional: until it runs the registry holds no rows for this pack and every lookup returns nothing. No configuration is needed; the defaults are merged without publishing anything.

### Usage

Icons are addressed as `ichava/icon-sets-carbon::<variant>/<name>`. In Blade, through core's component:

```blade
<x-ichava::icon name="ichava/icon-sets-carbon::size-32/add" class="w-6 h-6" />
```

Or from PHP, through core's helper:

```blade
{{ ichava('ichava/icon-sets-carbon::size-16/chevron-down')->class('w-5 h-5') }}
```

See [Getting started](docs/getting-started.md) for the full walkthrough, and the [Documentation](#documentation) index below for everything else.

## <a name="documentation"></a>Documentation

The full documentation lives in this repository, under `docs/`, and is indexed below.

### This pack

- [Installation](docs/installation.md) — requirements, the repositories block, seeding
- [Getting started](docs/getting-started.md) — your first icon from this pack
- [Configuration](docs/configuration.md) — why there is no config file, and what is core's instead
- [Architecture](docs/architecture.md) — what it ships, the subset it vendors, and why
- [Release](docs/release.md) — how a version is cut, and when the core floor moves
- [Variants](docs/variants.md) — the 2 variants, the `Variant` enum, and when to reach for which
- [Customisation](docs/customization.md) — sizing and colour
- [Attribution](docs/attribution.md) — upstream project, licence terms, and where the vendored version is recorded

### Shared across every pack

- [Use an icon pack](https://github.com/ichava/core/blob/main/docs/recipes/use-an-icon-pack.md) — addressing icons, in Blade and in PHP
- [Seed pack icons](https://github.com/ichava/core/blob/main/docs/recipes/seed-pack-icons.md) — the seeding pipeline and its options
- [Check pack updates](https://github.com/ichava/core/blob/main/docs/recipes/check-pack-updates.md) — the update checker and what its statuses mean

Its upstream is `@carbon/icons`; run core's [check pack updates](https://github.com/ichava/core/blob/main/docs/recipes/check-pack-updates.md) recipe to see whether a newer release exists.

## Contributing & security

See [CONTRIBUTING.md](CONTRIBUTING.md). Report vulnerabilities privately through [security policy](https://github.com/ichava/icon-sets-carbon/security/policy) — never in a public issue.

## License

Two licences apply, split by file. The package code is **MIT**, © Simtabi LLC, and the root [LICENSE](LICENSE) is that MIT text. The icons are [Carbon Icons](https://carbondesignsystem.com/elements/icons/library/), © IBM Corp., under the **Apache License 2.0**; its text is `resources/assets/svg/licenses/carbon/LICENSE`, beside a `NOTICE` that says how the files were changed.

Simtabi LLC claims no authorship of the icons. The terms, what was changed and the credit line are in [ATTRIBUTION.md](ATTRIBUTION.md), which ships with the package and must accompany any copy of the icons.
