---
title: Validate
description: Learn how to use validation statements
breadcrumbs: [Documentation, Statements, Validate]
---

::: info
This page will describe how [validation](https://laravel.com/docs/10.x/validation) can be used in a controller.
:::

## Examples

### Validate

```yaml
arch: 1.0.0
definitions:
  controllers:
    web:
      User:
        methods:
          index:
            - validate: post
```

### Validate (Multiple Fields)

```yaml
arch: 1.0.0
definitions:
  controllers:
    web:
      User:
        methods:
          index:
            - validate: title, content, author_id
```
