# Attribution and licence

*Reference.*

## Upstream

[Carbon Icons](https://carbondesignsystem.com/elements/icons/library/) is made by IBM Corp.. Source: [github.com/carbon-design-system/carbon](https://github.com/carbon-design-system/carbon).

## Licence

The icons and this package are owned separately:

- **The icons** are © IBM Corp., under [Apache-2.0](https://github.com/carbon-design-system/carbon/blob/v11.119.0/LICENSE). Simtabi LLC redistributes them and claims no authorship of them.
- **This package's code** (provider, enum, component, configuration) is © Simtabi LLC, [MIT](../LICENSE).

Apache-2.0 allows commercial and non-commercial use, modification and redistribution, provided a copy of the licence goes with every copy, modified files say so, and any upstream NOTICE is carried along. The licence text and a NOTICE stating what was changed ship under `resources/assets/svg/licenses/carbon/`, and [`ATTRIBUTION.md`](../ATTRIBUTION.md) at the package root repeats the terms. Both ship in the dist archive (`docs/` does not). Keep them with the icons if you copy them out of the package.

## Credit

A visible credit is not required by the licence, but is welcome on a "credits" or "about" page:

> Icons from [Carbon Design System](https://carbondesignsystem.com) by IBM (Apache-2.0).

## Updating from upstream

Asset refreshes run **maintainer-side** via
[`ichava/icon-sets-sync`](https://github.com/ichava/icon-sets-sync). End users **don't** refresh
locally -- `vendor/` is regenerated on every `composer install`, so any local change is discarded.
Run `php artisan ichava::ichava-core.check-updates --package=ichava/icon-sets-carbon` to see whether a new upstream
version is available.

## See also

- [Carbon Icons](https://carbondesignsystem.com/elements/icons/library/)
- [Source repository](https://github.com/carbon-design-system/carbon)

---

[← Docs index](../README.md#documentation)
