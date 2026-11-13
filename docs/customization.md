# Customisation

*How-to guide.* Colour and size for this pack's icons.

## Colour

Each SVG has a square `viewBox` (`0 0 32 32` or `0 0 16 16`) and paints with the default fill (black). Set `fill: currentColor` on the `svg` to make it follow the text colour.

```blade
<x-ichava::icon name="ichava/icon-sets-carbon::size-32/add" class="w-6 h-6 fill-current text-red-500" />
```

With the fluent helper:

```blade
{{ ichava('ichava/icon-sets-carbon::size-32/add')->class('w-6 h-6 fill-current text-gray-700') }}
```

## Size

The SVGs scale from their `viewBox`. Use any width and height utility:

```blade
<x-ichava::icon name="ichava/icon-sets-carbon::size-32/add" class="w-4 h-4" />
<x-ichava::icon name="ichava/icon-sets-carbon::size-32/add" class="w-12 h-12" />
```

## Accessibility

Add `aria-label` for icons that carry meaning (no adjacent text label):

```blade
<x-ichava::icon name="ichava/icon-sets-carbon::size-32/add" aria-label="Home" class="w-5 h-5" />
```

## See also

- [Variants](variants.md)
- [Blade components](https://github.com/ichava/core/blob/main/docs/tools/blade-components.md)

---

[← Docs index](../README.md#documentation)
