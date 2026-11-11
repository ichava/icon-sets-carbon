# Architecture

*Explanation.* What this pack is, what it delegates, and why it is shaped that way.

## What it ships

2,841 SVGs, addressed by variants -- see [Variants](variants.md). Counted from the tracked
files rather than quoted from prose:

```bash
git ls-tree -r --name-only origin/main -- resources/assets/svg/files | grep -c '\.svg$'
```

Besides the assets it ships a provider, a constants class, an enum for its addressing axis, and a
Blade component extending core's. That is the whole surface.

## Why a subset

Sizes 32 and 16 only. Dropped: size 20 (9 files), size 24 (8 files) and the 18 unsized status glyphs at the root of `svg/`. Names are slugged (`chevron--down` is `chevron-down`); the `watson-health/` and `Q/` namespaces become name prefixes (`watson-health-study-view`, `q-h`). No two names collide after slugging.

Measured on 2026-11-04: before the subset, 2,876 SVGs, 1,419,136 bytes, 11 MB on disk (sizes 16, 20, 24 and 32, plus 18 unsized); after it, 2,841 SVGs, 1,410,037 bytes, 11 MB on disk (sizes 32 and 16). The pack plan
caps a pack at 150 MB on disk and 30,000 SVGs, because every install downloads the whole archive and
most applications use one style.

## It depends on core, and core does not depend on it

The pack registers its icon directory with core's `IconRegistry` during `bootingPackage()`, after
core's singletons are bound. Core discovers installed packs at runtime. It has no list of them, so a
pack is added by installing it and removed by removing it.

## It requires `ichava/core` only

`composer.json` requires `php` and `ichava/core`, and nothing under `src/` names a class from any
other `Simtabi\Laranail` namespace. The provider extends core's `IconPackServiceProvider` and declares
its constants class and its component class; core writes the `laranail/package-tools` signature, so
the `laranail/*` packages reach this pack only through core. The composer `type` is
`ichava-icon-set`, which is how core's pack discovery finds it. `tests/Unit/CoreOnlyDependencyTest.php`
fails if any of that changes.

## Upstream

Its upstream is the `@carbon/icons` npm package `11.91.0`, which is the version in carbon-design-system/carbon tag `v11.119.0`, directory `svg/`. The version these SVGs came from is recorded in
`resources/assets/svg/config.json` under `upstream.current_version`, and the licence text's SHA-256
under `license.sha256`, rather than written out here, so the two cannot drift.

## See also

- [Core architecture](https://github.com/ichava/core/blob/main/docs/architecture.md) -- topology, boot order, the registry
- [Attribution](attribution.md) -- the upstream project and its licence
- [Release](release.md)

---

[← Docs index](../README.md#documentation)
