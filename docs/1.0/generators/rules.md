---
title: Rules
description: Learn how to generate rules
breadcrumbs: [Documentation, Generators, Rules]
---

::: info
This page will describe how [rules](https://laravel.com/docs/10.x/validation#custom-validation-rules) can be generated.
:::

## Examples

### [Rule](https://laravel.com/docs/10.x/validation#custom-validation-rules)

```yaml
arch: 1.0.0
definitions:
  rules:
    - Uppercase
```

### [Rule With Constructor](https://laravel.com/docs/10.x/validation#custom-validation-rules)

```yaml
arch: 1.0.0
definitions:
  rules:
    Lowercase:
      metadata:
        constructor:
          properties:
            key: string
```
