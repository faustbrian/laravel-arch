---
title: Authorize
description: Learn how to use authorize statements
breadcrumbs: [Documentation, Statements, Authorize]
---

::: info
This page will describe how [authorization](https://laravel.com/docs/10.x/authorization) can be used in a controller.
:::

## Examples

### With `authorize`

```yaml
arch: 1.0.0
definitions:
  controllers:
    web:
      User:
        methods:
          index:
            - authorize: true
```

### With `authorizeForUser`

```yaml
arch: 1.0.0
definitions:
  controllers:
    web:
      User:
        methods:
          index:
            - authorizeForUser: true
```

### With `can`

```yaml
arch: 1.0.0
definitions:
  controllers:
    web:
      User:
        methods:
          index:
            - can: true
```

### With `canAny`

```yaml
arch: 1.0.0
definitions:
  controllers:
    web:
      User:
        methods:
          index:
            - canAny: true
```

### With `cannot`

```yaml
arch: 1.0.0
definitions:
  controllers:
    web:
      User:
        methods:
          index:
            - cannot: true
```

### With `cant`

```yaml
arch: 1.0.0
definitions:
  controllers:
    web:
      User:
        methods:
          index:
            - cant: true
```
