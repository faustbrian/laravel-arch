---
title: Notify
description: Learn how to use notify statements
breadcrumbs: [Documentation, Statements, Notify]
---

::: info
This page will describe how [notifications using the notifiable trait](https://laravel.com/docs/10.x/notifications#using-the-notifiable-trait) can be sent from a controller.
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
            - notify: post.author ReviewPost with:post
```
