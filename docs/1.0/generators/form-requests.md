---
title: Form Requests
description: Learn how to generate form requests
breadcrumbs: [Documentation, Generators, Form Requests]
---

::: info
This page will describe how [form requests](https://laravel.com/docs/10.x/validation#form-request-validation) can be generated.
:::

## Examples

### [Form Request](https://laravel.com/docs/10.x/validation#creating-form-requests)

```yaml
arch: 1.0.0
definitions:
  formRequests:
    - StoreUser
```

### [Form Request With Rules](https://laravel.com/docs/10.x/validation#creating-form-requests)

```yaml
arch: 1.0.0
definitions:
  formRequests:
    StoreUser:
      rules:
        username: required|string|min:3|max:255
```
