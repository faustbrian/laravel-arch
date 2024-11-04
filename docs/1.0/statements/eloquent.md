---
title: Eloquent
description: Learn how to use eloquent statements
breadcrumbs: [Documentation, Statements, Eloquent]
---

::: info
This page will describe how [Eloquent](https://laravel.com/docs/10.x/eloquent) can be used in a controller.
:::

## Examples

### Store

```yaml
arch: 1.0.0
definitions:
  controllers:
    web:
      User:
        methods:
          index:
            - store: post.title
```

### Update

```yaml
arch: 1.0.0
definitions:
  controllers:
    web:
      User:
        methods:
          index:
            - update: post
```

### Update (Multiple Columns)

```yaml
arch: 1.0.0
definitions:
  controllers:
    web:
      User:
        methods:
          index:
            - update: title, content, author_id
```
