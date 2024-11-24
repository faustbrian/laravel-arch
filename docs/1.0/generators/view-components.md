---
title: View Components
description: Learn how to generate view components
breadcrumbs: [Documentation, Generators, View Components]
---

::: info
This page will describe how [view components](https://laravel.com/docs/10.x/blade#components) can be generated.
:::

## Examples

### [View Component](https://laravel.com/docs/10.x/blade#components)

```yaml
arch: 1.0.0
definitions:
  viewComponents:
    - Alert
```

### [View Component With Constructor](https://laravel.com/docs/10.x/blade#components)

```yaml
arch: 1.0.0
definitions:
  viewComponents:
    Notification:
      metadata:
        constructor:
          properties:
            key: string
```
