---
title: Fire
description: Learn how to use fire statements
breadcrumbs: [Documentation, Statements, Fire]
---

::: info
This page will describe how [events](https://laravel.com/docs/10.x/events) can be fired from a controller.
:::

## Examples

```yaml
arch: 1.0.0
definitions:
  controllers:
    web:
      User:
        methods:
          index:
            - fire: post.new with:post
```
