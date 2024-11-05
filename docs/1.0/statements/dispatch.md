---
title: Dispatch
description: Learn how to use dispatch statements
breadcrumbs: [Documentation, Statements, Dispatch]
---

::: info
This page will describe how [events](https://laravel.com/docs/10.x/events) can be dispatched from a controller.
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
            - dispatch: SyncMedia with:user with:post
```
