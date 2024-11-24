---
title: Notification
description: Learn how to use notification statements
breadcrumbs: [Documentation, Statements, Notification]
---

::: info
This page will describe how [notifications using the notification facade](https://laravel.com/docs/10.x/notifications#using-the-notification-facade) can be sent from a controller.
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
            - notification: ReviewPost recipient:post.author with:post
```
