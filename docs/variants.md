# Variants

*Reference.* The 2 variants of `ichava/icon-sets-carbon`, and how to address them.

`ichava/icon-sets-carbon` ships **2,841 icons across 2 variants**. Each variant is a folder under `resources/assets/svg/files/`, and core files every icon under its folder, so the variant is the first segment of the icon path.

| Variant | Path | Icons | Style |
|---|---|---:|---|
| `size-32` | `size-32/<name>` | 2,773 | The full set, drawn on the 32 px grid |
| `size-16` | `size-16/<name>` | 68 | Glyphs redrawn for 16 px, where upstream ships one |

The default variant is `size-32`. Always include the variant in the icon path: `ichava/icon-sets-carbon::size-32/add`.

Each SVG has a square `viewBox` (`0 0 32 32` or `0 0 16 16`) and paints with the default fill (black). Set `fill: currentColor` on the `svg` to make it follow the text colour.

## Examples

```blade
<x-ichava::icon name="ichava/icon-sets-carbon::size-32/add" class="w-6 h-6" />
<x-ichava::icon name="ichava/icon-sets-carbon::size-16/chevron-down" class="w-6 h-6" />
```

## Variant enum (PHP)

```php
use Simtabi\Laranail\Ichava\IconSetsCarbon\Enums\Variant;

Variant::SIZE_32->value;               // 'size-32'
Variant::SIZE_16->value;               // 'size-16'
Variant::default();             // Variant::SIZE_32
```

The enum implements `IconSetVariantInterface` from core, so it works wherever core's registry expects a variant.

## What is not here

Sizes 32 and 16 only. Dropped: size 20 (9 files), size 24 (8 files) and the 18 unsized status glyphs at the root of `svg/`. Names are slugged (`chevron--down` is `chevron-down`); the `watson-health/` and `Q/` namespaces become name prefixes (`watson-health-study-view`, `q-h`). No two names collide after slugging.

## See also

- [Customisation](customization.md), colour and size
- [Icon path format](https://github.com/ichava/core/blob/main/docs/tools/icon-path-format.md)

---

[← Docs index](../README.md#documentation)
