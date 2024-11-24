---
title: Resource
description: Learn how to use resource statements
breadcrumbs: [Documentation, Statements, Resource]
---

::: info
This page will describe how [resources](https://laravel.com/docs/10.x/eloquent-resources) can be used in a controller.
:::

## Examples

### Collection

```yaml
arch: 1.0.0
definitions:
  controllers:
    web:
      User:
        methods:
          index:
            - resource: user collection
```

### Paginated

```yaml
arch: 1.0.0
definitions:
  controllers:
    web:
      User:
        methods:
          index:
            - resource: user paginate
```

### Paginated (Simple)

```yaml
arch: 1.0.0
definitions:
  controllers:
    web:
      User:
        methods:
          index:
            - resource: user simplePaginate
```
