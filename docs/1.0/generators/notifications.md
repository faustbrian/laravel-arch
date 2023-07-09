---
title: Notifications
description: Learn how to generate notifications
breadcrumbs: [Documentation, Generators, Notifications]
---

::: info
This page will describe how [notifications](https://laravel.com/docs/10.x/notifications) can be generated.
:::

## Examples

### [Notification](https://laravel.com/docs/10.x/notifications#generating-notifications)

```yaml
arch: 1.0.0
definitions:
  notifications:
    OrderShipped:
      subject: Order Shipped
```

### [Notification With Constructor](https://laravel.com/docs/10.x/notifications#generating-notifications)

```yaml
arch: 1.0.0
definitions:
  notifications:
    OrderShippedWithConstructor:
      subject: Order Shipped
      metadata:
        constructor:
          properties:
            key: string
```

### [Queued](https://laravel.com/docs/10.x/notifications#queueing-notifications)

```yaml
arch: 1.0.0
definitions:
  notifications:
    OrderShippedQueued:
      subject: Order Shipped
      shouldQueue: true
```

### [Markdown](https://laravel.com/docs/10.x/notifications#markdown-mail-notifications)

```yaml
arch: 1.0.0
definitions:
  notifications:
    OrderShippedWithMarkdown:
      subject: Order Shipped
      shouldBeMarkdown: true
```

### [Markdown](https://laravel.com/docs/10.x/notifications#markdown-mail-notifications) [Queued](https://laravel.com/docs/10.x/notifications#queueing-notifications)

```yaml
arch: 1.0.0
definitions:
  notifications:
    OrderShippedWithMarkdownQueued:
      subject: Order Shipped
      shouldQueue: true
      shouldBeMarkdown: true
```
