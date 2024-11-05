---
title: View
description: Learn how to use view statements
breadcrumbs: [Documentation, Statements, View]
---

::: info
This page will describe how [views](https://laravel.com/docs/10.x/views) can be rendered from a controller.
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
            - view: post.show with:post with:foo with:bar
```
