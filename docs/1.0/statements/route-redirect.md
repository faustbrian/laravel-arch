---
title: Route Redirect
description: Learn how to use route redirect statements
breadcrumbs: [Documentation, Statements, Route Redirect]
---

::: info
This page will describe how [redirects](https://laravel.com/docs/10.x/redirects#redirecting-named-routes) can be used in a controller.
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
            - redirect: post.show with:post
```
