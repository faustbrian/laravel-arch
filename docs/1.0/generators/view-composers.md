---
title: View Composers
description: Learn how to generate view composers
breadcrumbs: [Documentation, Generators, View Composers]
---

::: info
This page will describe how [view composers](https://laravel.com/docs/10.x/views#view-composers) can be generated.
:::

## Examples

### [View Composer](https://laravel.com/docs/10.x/views#view-composers)

```yaml
arch: 1.0.0
definitions:
  viewComposers:
    - Dashboard
```

### [View Composer With Constructor](https://laravel.com/docs/10.x/views#view-composers)

```yaml
arch: 1.0.0
definitions:
  viewComposers:
    Profile:
      metadata:
        constructor:
          properties:
            key: string
```
