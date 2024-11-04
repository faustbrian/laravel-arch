---
title: Inertia Render
description: Learn how to use inertia render statements
breadcrumbs: [Documentation, Statements, Inertia, Render]
---

::: info
This page will describe how [Inertia views](https://inertiajs.com/server-side-setup) can be rendered from a controller.
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
            - render: post.show with:post with:foo with:bar
```
