---
title: Session
description: Learn how to use session statements
breadcrumbs: [Documentation, Statements, Session]
---

::: info
This page will describe how [sessions](https://laravel.com/docs/10.x/session) can be used in a controller.
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
            - flash: post.title
```
