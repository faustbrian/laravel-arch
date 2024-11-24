---
title: Observers
description: Learn how to generate observers
breadcrumbs: [Documentation, Generators, Observers]
---

::: info
This page will describe how [observers](https://laravel.com/docs/10.x/eloquent#observers) can be generated.
:::

## Examples

### [Observer](https://laravel.com/docs/10.x/eloquent#observers)

```yaml
arch: 1.0.0
definitions:
  observers:
    - User
```

### [Observer Without Methods](https://laravel.com/docs/10.x/eloquent#observers)

```yaml
arch: 1.0.0
definitions:
  observers:
    Post:
      plain: true
```
