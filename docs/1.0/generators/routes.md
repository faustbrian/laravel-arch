---
title: Routes
description: Learn how to generate routes
breadcrumbs: [Documentation, Generators, Routes]
---

::: info
This page will describe how [routes](https://laravel.com/docs/10.x/routing) can be generated.
:::

## Examples

### [Routes](https://laravel.com/docs/10.x/routing#basic-routing)

```yaml
arch: 1.0.0
definitions:
  routes:
    api:
      - verb: 'resource'
        uri: 'users'
        action: 'UserController'
        methods: ['index', 'store', 'update']
    web:
      - verb: 'resource'
        uri: 'users'
        action: 'UserController'
        methods: ['index', 'store', 'update']
```
