---
title: Policies
description: Learn how to generate policies
breadcrumbs: [Documentation, Generators, Policies]
---

::: info
This page will describe how [policies](https://laravel.com/docs/10.x/authorization#creating-policies) can be generated.
:::

## Examples

### [Policy](https://laravel.com/docs/10.x/authorization#generating-policies)

```yaml
arch: 1.0.0
definitions:
  policies:
    - Post
```

### [Policy Without Methods](https://laravel.com/docs/10.x/authorization#generating-policies)

```yaml
arch: 1.0.0
definitions:
  policies:
    Product:
      plain: true
```
