# Changelog

All notable changes to `ichava/icon-sets-carbon` follow [Keep a Changelog](https://keepachangelog.com/en/1.0.0/) and [Semantic Versioning](https://semver.org/).

## [Unreleased]

### Changed

- **The upstream sync runs icon-sets-sync `06b17d7`** (icon-sets-sync#88), up from `5fa93a6`, which adds this pack's recipe, the `split-variants` and `exclude` transforms, and the `licence_sha256` pin on the upstream licence text. The `uses:` pin and `toolkit-ref` move together; the reusable workflow's inputs did not change between the two commits, so the caller's `with:` block is untouched.

## [0.1.0] - TBD

First release of `ichava/icon-sets-carbon` (pack plan rank, owner decision of 2026-11-04 to ship every planned pack in v0.1.0).

### Added

- **2,841 Carbon Icons SVGs** from the `@carbon/icons` npm package `11.91.0`, which is the version in carbon-design-system/carbon tag `v11.119.0`, directory `svg/`, in 2 variants: `size-32` (2,773), `size-16` (68). Every file went through icon-sets-sync's SVG sanitiser.
- **A size policy.** Sizes 32 and 16 only. Dropped: size 20 (9 files), size 24 (8 files) and the 18 unsized status glyphs at the root of `svg/`. Names are slugged (`chevron--down` is `chevron-down`); the `watson-health/` and `Q/` namespaces become name prefixes (`watson-health-study-view`, `q-h`). No two names collide after slugging. Before the subset: 2,876 SVGs, 1,419,136 bytes, 11 MB on disk (sizes 16, 20, 24 and 32, plus 18 unsized). After: 2,841 SVGs, 1,410,037 bytes, 11 MB on disk (sizes 32 and 16).
- **Licensing kept apart.** `LICENSE` is the MIT licence for the package code; the icons are Apache-2.0, with the upstream text at `resources/assets/svg/licenses/carbon/LICENSE`, a `NOTICE` beside it, and the notice in `ATTRIBUTION.md`. `config.json` records the licence's SPDX id, SHA-256 and the date it was checked, and `AttributionTest` fails if the shipped text stops matching that hash.
- **Tests:** the provider boots and registers the pack; the variant counts, the `Variant` enum and the SVG kind are pinned; no SVG carries stray text; and the sibling, attribution, docs-shape, personal-contact, PHPStan-level, release-version, workflow-permission and sync-caller guards the other packs carry.
