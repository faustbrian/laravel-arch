---
title: Casts
description: Learn how to generate casts
breadcrumbs: [Documentation, Generators, Casts]
---

::: info
This page will describe how [casts](https://laravel.com/docs/10.x/eloquent-mutators#custom-casts) can be generated.
:::

## Examples

### [Value Object Casting](https://laravel.com/docs/10.x/eloquent-mutators#value-object-casting)

```yaml
arch: 1.0.0
definitions:
  casts:
    - Json
```

### [Inbound Casting](https://laravel.com/docs/10.x/eloquent-mutators#inbound-casting)

```yaml
arch: 1.0.0
definitions:
  casts:
    Inbound:
      inbound: true
```
