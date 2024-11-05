---
title: Respond
description: Learn how to use respond statements
breadcrumbs: [Documentation, Statements, Respond]
---

::: info
This page will describe how [responses](https://laravel.com/docs/10.x/responses) can be used in a controller.
:::

## Examples

### "200 OK" with JSON

```yaml
arch: 1.0.0
definitions:
  controllers:
    web:
      User:
        methods:
          index:
            - respond: content:post
```

### "204 No Content"

```yaml
arch: 1.0.0
definitions:
  controllers:
    web:
      User:
        methods:
          index:
            - respond: statusCode:204
```
