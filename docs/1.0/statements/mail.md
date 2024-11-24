---
title: Mail
description: Learn how to use mail statements
breadcrumbs: [Documentation, Statements, Mail]
---

::: info
This page will describe how [mails](https://laravel.com/docs/10.x/mail) can be sent from a controller.
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
            - mail: ReviewPost recipient:post.author with:post
```
